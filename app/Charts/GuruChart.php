<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Conterbacaguru;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Tambahkan ini

class GuruChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function barChart($monthYear = null)
{
    $topGuru = $this->getTopGuru($monthYear);

    return $this->chart->barChart()
        ->setTitle('Top 6 Guru dengan View Terbanyak')
        ->setSubtitle(Carbon::parse($monthYear . '-01')->translatedFormat('F Y'))
        ->addData('Jumlah View', $topGuru['jumlah'])
        ->setXAxis($topGuru['label'])
        ->setColors(['#28c76f']);
}

private function getTopGuru($monthYear = null)
{
    if (!$monthYear) {
        $monthYear = now()->format('Y-m');
    }

    $startOfMonth = Carbon::parse($monthYear . '-01')->startOfMonth();
    $endOfMonth = Carbon::parse($monthYear . '-01')->endOfMonth();

    $topGuru = Conterbacaguru::whereBetween('date', [$startOfMonth, $endOfMonth])
        ->select('id_guru', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('id_guru')
        ->orderByDesc('jumlah')
        ->limit(6)
        ->get();

    $label = [];
    $jumlah = [];

    foreach ($topGuru as $guru) {
        $user = Guru::find($guru->id_guru);
        if ($user) {
            $label[] = $user->nama . ' (' . $user->mengampu . ')';
            $jumlah[] = $guru->jumlah;
        }
    }

    return ['label' => $label, 'jumlah' => $jumlah];
}

}
