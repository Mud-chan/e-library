<?php

return [
    // bobot defaultnya kriteriadiatur di .env
    'weights' => [
        'average_rating'   => env('TOPSIS_WEIGHT_RATING', 0.5),
        'kategori_score'   => env('TOPSIS_WEIGHT_KATEGORI', 0.3),
        'tingkatan_score'  => env('TOPSIS_WEIGHT_TINGKATAN', 0.2),
    ],

    'kategori' => [
        'Buku Pelajaran' => 1.0,
        'Buku Cerita'    => 0.8,
        'Novel'          => 0.6,
        'Komik'          => 0.4,
    ],

    'tingkatan' => [
        'Semua kelas' => 1.0,
        'Umum'        => 0.8,
        'Kelas 1'     => 0.9,
        'Kelas 2'     => 0.8,
        'Kelas 3'     => 0.7,
        'Kelas 4'     => 0.6,
        'Kelas 5'     => 0.5,
        'Kelas 6'     => 0.4,
    ],
];
?>