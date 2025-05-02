<?php
// app/Services/TopsisService.php

namespace App\Services;

use Illuminate\Support\Collection;

class TopsisService
{
    protected array $weights;

    public function __construct()
    {
        // Ambil bobot dari konfigurasi
        $this->weights = config('topsis.weights');
    }

    /**
     * Hitung rekomendasi dan detail proses TOPSIS
     * @return array ['results' => [...], 'process' => [...]]
     */
    public function calculate(Collection $books): array
    {
        if ($books->isEmpty()) {
            return ['results' => [], 'process' => []];
        }

        $matrix    = $this->createDecisionMatrix($books);
        $normalized= $this->normalizeMatrix($matrix);
        $weighted  = $this->applyWeights($normalized);
        [$idealPos,$idealNeg] = $this->calculateIdealSolutions($weighted);
        $prefs     = $this->calculatePreferences($weighted, $idealPos, $idealNeg);

        $results = $this->formatResults($books, $prefs);

        $process = compact('matrix','normalized','weighted','idealPos','idealNeg','prefs');

        return compact('results','process');
    }

    protected function createDecisionMatrix(Collection $books): array
    {
        $kategoriMap  = config('topsis.kategori');
        $tingkatanMap = config('topsis.tingkatan');

        return $books->map(fn($b) => [
            'average_rating'  => (float) $b->average_rating,
            'kategori_score'  => $kategoriMap[$b->kategori] ?? 0,
            'tingkatan_score' => $tingkatanMap[$b->tingkatan] ?? 0,
        ])->all();
    }

    protected function normalizeMatrix(array $matrix): array
    {
        $norm = [];
        foreach ($this->weights as $key => $_) {
            $col = array_column($matrix, $key);
            $den = sqrt(array_sum(array_map(fn($v) => $v**2, $col))) ?: 1;
            foreach ($matrix as $i => $row) {
                $norm[$i][$key] = $row[$key] / $den;
            }
        }
        return $norm;
    }

    protected function applyWeights(array $normalized): array
    {
        $weighted = [];
        foreach ($normalized as $i => $row) {
            foreach ($row as $key => $val) {
                $weighted[$i][$key] = $val * $this->weights[$key];
            }
        }
        return $weighted;
    }

    protected function calculateIdealSolutions(array $weighted): array
    {
        $pos = [];
        $neg = [];
        foreach (array_keys($this->weights) as $key) {
            $col = array_column($weighted, $key);
            $pos[$key] = max($col);
            $neg[$key] = min($col);
        }
        return [$pos, $neg];
    }

    protected function calculatePreferences(array $weighted, array $idealPos, array $idealNeg): array
    {
        $prefs = [];
        foreach ($weighted as $i => $row) {
            $dPos = $dNeg = 0;
            foreach ($row as $key => $val) {
                $dPos += ($val - $idealPos[$key])**2;
                $dNeg += ($val - $idealNeg[$key])**2;
            }
            $dPos = sqrt($dPos);
            $dNeg = sqrt($dNeg);
            $prefs[$i] = ($dPos + $dNeg) ? $dNeg/($dPos + $dNeg) : 0;
        }
        return $prefs;
    }

    protected function formatResults(Collection $books, array $prefs): array
    {
        return $books->values()
            ->map(fn($b, $i) => ['book' => $b, 'preference' => $prefs[$i] ?? 0])
            ->sortByDesc('preference')
            ->values()
            ->all();
    }
}
?>