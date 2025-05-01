<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Services\TopsisService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    protected TopsisService $topsis;

    public function __construct(TopsisService $topsis)
    {
        $this->topsis = $topsis;
    }

    public function recommend(Request $request)
    {
        $request->validate([
            'kategori' => 'sometimes|string',
            'tingkatan' => 'sometimes|string',
            'min_rating' => 'sometimes|numeric|min:0|max:5'
        ]);

        $categories = ['Buku Pelajaran', 'Buku Cerita', 'Novel', 'Komik'];
        $levels = ['Semua kelas', 'Umum', 'Kelas 1', 'Kelas 2', 'Kelas 3', 'Kelas 4', 'Kelas 5', 'Kelas 6'];

        $query = Buku::query()
            ->with(['rating' => function($query) {
                $query->select('id_buku', DB::raw('AVG(rating) as average_rating'))
                      ->groupBy('id_buku');
            }]);

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('tingkatan')) {
            $query->where('tingkatan', $request->tingkatan);
        }

        if ($request->filled('min_rating')) {
            $query->whereIn('id', function($subQuery) use ($request) {
                $subQuery->select('id_buku')
                        ->from('rating') // Pastikan nama tabel sesuai
                        ->groupBy('id_buku')
                        ->havingRaw('AVG(rating) >= ?', [$request->min_rating]);
            });
        }

        $books = $query->get()->map(function ($book) {
            $book->average_rating = $book->rating->first()->average_rating ?? 0;
            return $book;
        });

        if ($books->isEmpty()) {
            return view('recommendations', [
                'recommendations' => [],
                'categories' => $categories,
                'levels' => $levels,
                'message' => 'Tidak ada buku yang sesuai dengan filter yang diberikan.'
            ]);
        }

        $recommendations = $this->topsis->calculate($books);

        return view('recommendations', [
            'recommendations' => $recommendations,
            'categories' => $categories,
            'levels' => $levels,
            'message' => null
        ]);
    }
}