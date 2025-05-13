<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Conterbacaguru;
use App\Models\Conterbaca;
use App\Models\Guru;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Tambahkan ini

class BukuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function mostReadBooksChart($monthYear = null)
{
    $topBooks = $this->getTopBooks($monthYear);

    return $this->chart->barChart()
        ->setTitle('Top 6 Buku Paling Banyak Dibaca')
        ->setSubtitle(Carbon::parse($monthYear . '-01')->translatedFormat('F Y'))
        ->addData('Jumlah View', $topBooks['jumlah'])
        ->setXAxis($topBooks['label'])
        ->setColors(['#28c76f']);
}


private function getTopBooks($monthYear = null)
{
    if (!$monthYear) {
        $monthYear = now()->format('Y-m');
    }

    $startOfMonth = Carbon::parse($monthYear . '-01')->startOfMonth();
    $endOfMonth = Carbon::parse($monthYear . '-01')->endOfMonth();

    // Ambil jumlah view dari siswa
    $siswaViews = Conterbaca::whereBetween('date', [$startOfMonth, $endOfMonth])
        ->select('id_buku', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('id_buku')
        ->get()
        ->keyBy('id_buku');

    // Ambil jumlah view dari guru
    $guruViews = Conterbacaguru::whereBetween('date', [$startOfMonth, $endOfMonth])
        ->select('id_buku', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('id_buku')
        ->get()
        ->keyBy('id_buku');

    // Gabungkan data
    $totalViews = [];

    // Masukkan dari siswa
    foreach ($siswaViews as $id_buku => $data) {
        $totalViews[$id_buku] = $data->jumlah;
    }

    // Tambahkan dari guru
    foreach ($guruViews as $id_buku => $data) {
        if (isset($totalViews[$id_buku])) {
            $totalViews[$id_buku] += $data->jumlah;
        } else {
            $totalViews[$id_buku] = $data->jumlah;
        }
    }

    // Urutkan dan ambil 6 teratas
    arsort($totalViews);
    $top6 = array_slice($totalViews, 0, 6, true);

    $label = [];
    $jumlah = [];

    foreach ($top6 as $id_buku => $total) {
        $buku = Buku::find($id_buku);
        if ($buku) {
            $label[] = $buku->judul;
            $jumlah[] = $total;
        }
    }

    return ['label' => $label, 'jumlah' => $jumlah];
}


}
