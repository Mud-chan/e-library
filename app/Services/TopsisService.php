<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TopsisService
{
    public function calculate(Collection $books): array
    {
        if ($books->isEmpty()) {
            return [];
        }

        // Buat matriks keputusan
        $matrix = $this->createDecisionMatrix($books);

        // Bobot kriteria (rating 50%, kategori 30%, tingkatan 20%)
        $weights = [
            'average_rating' => 0.5,
            'kategori_score' => 0.3,
            'tingkatan_score' => 0.2,
        ];

        // Normalisasi matriks
        $normalizedMatrix = $this->normalizeMatrix($matrix, $weights);

        // Hitung matriks terbobot
        $weightedMatrix = $this->applyWeights($normalizedMatrix, $weights);

        // Solusi ideal positif dan negatif
        [$idealPositive, $idealNegative] = $this->calculateIdealSolutions($weightedMatrix, $weights);

        // Hitung preferensi
        $preferences = $this->calculatePreferences($weightedMatrix, $idealPositive, $idealNegative);

        // Gabungkan dengan data buku
        return $this->formatResults($books, $preferences);
    }

    protected function createDecisionMatrix(Collection $books): array
    {
        // Mapping kategori dan tingkatan
        $kategoriMap = [
            'Buku Pelajaran' => 1.0,
            'Buku Cerita' => 0.8,
            'Novel' => 0.6,
            'Komik' => 0.4,
        ];

        $tingkatanMap = [
            'Semua kelas' => 1.0,
            'Umum' => 0.8,
            'Kelas 1' => 0.9,
            'Kelas 2' => 0.8,
            'Kelas 3' => 0.7,
            'Kelas 4' => 0.6,
            'Kelas 5' => 0.5,
            'Kelas 6' => 0.4,
            
        ];

        return $books->map(function ($book) use ($kategoriMap, $tingkatanMap) {
            return [
                'average_rating' => (float) $book->average_rating,
                'kategori_score' => $kategoriMap[$book->kategori] ?? 0.5,
                'tingkatan_score' => $tingkatanMap[$book->tingkatan] ?? 0.5,
            ];
        })->toArray();
    }

    protected function normalizeMatrix(array $matrix, array $weights): array
    {
        $normalizedMatrix = [];

        foreach ($weights as $key => $weight) {
            $column = array_column($matrix, $key);
            $denominator = sqrt(array_sum(array_map(fn($v) => $v ** 2, $column))) ?: 1;

            foreach ($matrix as $i => $row) {
                $normalizedMatrix[$i][$key] = $row[$key] / $denominator;
            }
        }

        return $normalizedMatrix;
    }

    protected function applyWeights(array $normalizedMatrix, array $weights): array
    {
        $weightedMatrix = [];

        foreach ($normalizedMatrix as $i => $row) {
            foreach ($row as $key => $value) {
                $weightedMatrix[$i][$key] = $value * $weights[$key];
            }
        }

        return $weightedMatrix;
    }

    protected function calculateIdealSolutions(array $weightedMatrix, array $weights): array
    {
        $idealPositive = [];
        $idealNegative = [];

        foreach (array_keys($weights) as $key) {
            $column = array_column($weightedMatrix, $key);
            $idealPositive[$key] = max($column);
            $idealNegative[$key] = min($column);
        }

        return [$idealPositive, $idealNegative];
    }

    protected function calculatePreferences(array $weightedMatrix, array $idealPositive, array $idealNegative): array
    {
        $preferences = [];

        foreach ($weightedMatrix as $i => $row) {
            $dPositive = 0;
            $dNegative = 0;

            foreach ($row as $key => $value) {
                $dPositive += ($value - $idealPositive[$key]) ** 2;
                $dNegative += ($value - $idealNegative[$key]) ** 2;
            }

            $dPositive = sqrt($dPositive);
            $dNegative = sqrt($dNegative);

            $preferences[$i] = ($dPositive + $dNegative) == 0 ? 0 : $dNegative / ($dPositive + $dNegative);
        }

        return $preferences;
    }

    protected function formatResults(Collection $books, array $preferences): array
    {
        return $books->values()
            ->map(function ($book, $index) use ($preferences) {
                return [
                    'book' => $book,
                    'preference' => $preferences[$index] ?? 0,
                ];
            })
            ->sortByDesc('preference')
            ->values()
            ->all();
    }
}