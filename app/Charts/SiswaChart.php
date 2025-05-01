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

    public function areaChart()
    {
        $topSiswa = $this->getTopSiswa();

        return $this->chart->areaChart()
            ->setTitle('Top 6 Siswa dengan View Terbanyak Bulan Ini')
            ->setSubtitle(date('F Y')) // tampilkan bulan dan tahun
            ->addData('Jumlah View', $topSiswa['jumlah'])
            ->setXAxis($topSiswa['label']) // label = nama + kelas
            ->setColors(['#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#FF8333', '#33FFF5']);
    }

    private function getTopSiswa()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

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
