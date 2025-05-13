<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Conterbaca;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Tambahkan ini

class SiswaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function barChart($monthYear = null)
    {
        $topSiswa = $this->getTopSiswa($monthYear);

        return $this->chart->barChart()
            ->setTitle('Top 6 Siswa dengan View Terbanyak Bulan Ini')
            ->setSubtitle(Carbon::parse($monthYear . '-01')->translatedFormat('F Y'))
            ->addData('Jumlah View', $topSiswa['jumlah'])
            ->setXAxis($topSiswa['label']) // label = nama + kelas
            ->setColors(['#28c76f']);
    }

    private function getTopSiswa($monthYear = null)
    {
        if (!$monthYear) {
        $monthYear = now()->format('Y-m');
    }

    $startOfMonth = Carbon::parse($monthYear . '-01')->startOfMonth();
    $endOfMonth = Carbon::parse($monthYear . '-01')->endOfMonth();

        $topSiswa = Conterbaca::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->select('id_siswa', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('id_siswa')
            ->orderByDesc('jumlah')
            ->limit(6)
            ->get();

        $label = [];
        $jumlah = [];

        foreach ($topSiswa as $siswa) {
            $user = User::find($siswa->id_siswa);
            if ($user) {
                $label[] = $user->nama . ' (' . $user->kelas . ')';
                $jumlah[] = $siswa->jumlah;
            }
        }

        return [
            'label' => $label,
            'jumlah' => $jumlah,
        ];
    }
}
