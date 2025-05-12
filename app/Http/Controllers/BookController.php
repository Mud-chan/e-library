<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Services\TopsisService;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct(protected TopsisService $topsis) {}

    public function recommend(Request $req)
    {
        $req->validate([
            'kategori'   => 'sometimes|string|in:' . implode(',', array_keys(config('topsis.kategori'))),
            'tingkatan'  => 'sometimes|string|in:' . implode(',', array_keys(config('topsis.tingkatan'))),
            'min_rating' => 'sometimes|numeric|min:0|max:5'
        ]);

        $categories = array_keys(config('topsis.kategori'));
        $levels     = array_keys(config('topsis.tingkatan'));

        $query = Buku::with(['rating' => fn($q) =>
            $q->select('id_buku', DB::raw('AVG(rating) as average_rating'))
              ->groupBy('id_buku')
        ]);

        if ($req->filled('kategori')) {
            $query->where('kategori', $req->kategori);
        }
        if ($req->filled('tingkatan')) {
            $query->where('tingkatan', $req->tingkatan);
        }
        if ($req->filled('min_rating')) {
            $min = $req->min_rating;
            $query->whereIn('id', fn($sub) =>
                $sub->select('id_buku')->from('rating')
                    ->groupBy('id_buku')->havingRaw('AVG(rating)>=?', [$min])
            );
        }

        $books = $query->get()->map(fn($b) =>
        tap($b, fn($m) => $m->average_rating = optional($m->rating->first())->average_rating ?? 0)
        );

        if ($books->isEmpty()) {
            return view('recommendations', compact('categories','levels'))
                ->with([
                    'results' => [],
                    'process' => [],
                    'message' => 'Tidak ada buku sesuai filter.',
                ]);
        }

        ['results' => $results, 'process' => $process] = $this->topsis->calculate($books);

        return view('recommendations', compact('results','process','categories','levels'));
    }
}
?>