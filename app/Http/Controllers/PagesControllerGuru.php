<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Guru;
use App\Models\Buku;
use App\Models\Bookmark;
use App\Models\Rating;
use App\Models\Comments;
use App\Models\Conterbaca;
use App\Models\Histori;
use App\Charts\SiswaChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PagesControllerGuru extends Controller
{
    public function index()
    {
        $tutorsId = Cookie::get('tutor_id'); // Ambil ID pengguna dari cookie
        $tutors = Guru::find($tutorsId); // Temukan pengguna berdasarkan ID
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;

        return view('components.spheader', [
            "title" => "Dashboard Guru",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function dashboard(SiswaChart $areaChart)
{
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('tutor_id');
    // Temukan data tutor berdasarkan ID
    $tutor = Guru::find($tutorId);
    if ($tutor) {
        $guruName = $tutor->nama;
        $guruImage = $tutor->image;
        $guruProfesi = $tutor->mengampu;
        // Hitung total tutor
        // Hitung total user
        $totalUsers = User::count();
        $siswa = User::all();
        $totalBuku = Buku::count();

        return view('dashboardguru', [
            "title" => "Dashboard Guru",
            "guruName" => $guruName,
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "totalUsers" => $totalUsers,
            "siswa" => $siswa,
            "totalBuku" => $totalBuku,
            "areaChart" => $areaChart->areaChart(),
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}



    public function carisiswaguru(Request $request)
{
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('tutor_id');

    // Temukan data tutor berdasarkan ID
    $tutor = Guru::find($tutorId);

    if ($tutor) {
        $guruName = $tutor->name;
        $guruImage = $tutor->image;
        $guruProfesi = $tutor->profession;


        // Hitung total user
        $totalUsers = User::count();

        // Ambil semua siswa
        $siswa = User::all();
        // $totalHargaTransaksi = Transaksi::join('playlist', 'transaksi.id_playlist', '=', 'playlist.id')
        //     ->sum('playlist.harga');

        // Hitung jumlah transaksi dengan status 'pending'
        // $jumlahTransaksiPending = Transaksi::join('dtl_user', 'transaksi.id_user', '=', 'dtl_user.id_user')
        // ->where('dtl_user.status', 'pending')
        // ->select('transaksi.id') // Select only the transaction IDs
        // ->distinct() // Ensure we count only distinct transactions
        // ->count();


        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');

            // Lakukan pencarian berdasarkan kriteria tertentu, misalnya nama siswa atau lainnya
            $siswa = User::where('name', 'like', '%' . $keyword . '%')->get();
        }

        // Kirim data ke view
        return view('dashboardguru', [
            "title" => "Dashboard Guru",
            "guruName" => $guruName,
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "totalUsers" => $totalUsers,
            "siswa" => $siswa,
            // "totalHargaTransaksi" => $totalHargaTransaksi,
            // "jumlahTransaksiPending" => $jumlahTransaksiPending,
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}


// public function user()
// {
//     return $this->belongsTo(User::class, 'id_siswa');
// }


// public function datatransaksi(Request $request)
// {
//     // Ambil ID tutor dari cookie
//     $tutorId = Cookie::get('sp_id');
//     // Temukan data tutor berdasarkan ID
//     $tutor = Guru::find($tutorId);
//     if ($tutor) {
//         $userName = $tutor->name;
//         $userImage = $tutor->image;
//         $userProfesi = $tutor->profession;
//         // Hitung total tutor
//         $totalTutors = Guru::count();
//         // Hitung total user
//         $totalUsers = User::count();

//         // Ambil data transaksi dengan pagination dan pencarian
//         $query = Peminjaman::query();

//         if ($request->has('search')) {
//             $keyword = $request->input('search');
//             $query->whereHas('user', function($q) use ($keyword) {
//                 $q->where('nama', 'like', "%$keyword%");
//             });
//         }

//         $transactions = $query->paginate(10); // 10 merupakan jumlah baris per halaman

//         foreach ($transactions as $transaction) {
//             // Ambil informasi user berdasarkan id_user di transaksi
//             $user = User::find($transaction->id_siswa);
//             $transaction->user = $user;

//             // Ambil status dari dtl_user
//             $dtlUser = Dtl_Siswa::where('id_siswa', $transaction->id_siswa)
//                                ->where('id_buku', $transaction->id_buku)
//                                ->first();
//             $transaction->status = $dtlUser ? $dtlUser->status : 'Status Tidak Tersedia';

//             // Ambil informasi playlist berdasarkan id_playlist di transaksi
//             $playlist = Buku::find($transaction->id_buku);
//             $transaction->buku = $playlist;
//         }

//         return view('datatransaksi', [
//             "title" => "Data Transaksi",
//             "userName" => $userName,
//             "userImage" => $userImage,
//             "userProfesi" => $userProfesi,
//             "totalTutors" => $totalTutors,
//             "totalUsers" => $totalUsers,
//             "transactions" => $transactions,
//             "totalPages" => $transactions->lastPage(),
//             "currentPage" => $transactions->currentPage()
//         ]);
//     } else {
//         return redirect()->route('loginnn');
//     }
// }

// public function caritransaksi(Request $request)
// {
//     return $this->datatransaksi($request);
// }

public function katalogbuku()
{
    // Ambil ID siswa dari cookie
    $siswaId = Cookie::get('user_id');
    $siswa = User::find($siswaId);

    if ($siswa) {
        $userName = $siswa->nama;
        $userImage = $siswa->image;
        $userProfesi = $siswa->email;

        // Ambil daftar buku berdasarkan kategori
        $contents = Buku::whereIn('kategori', ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'])
            ->orderBy('date', 'DESC')
            ->paginate(8);

        // === SISTEM REKOMENDASI CERDAS ===

        // Ambil histori baca siswa
        $history = Histori::with('buku')
            ->where('id_siswa', $siswaId)
            ->get();

        // Cek apakah siswa belum membaca buku
        if ($history->isEmpty()) {
            // Jika belum ada histori baca, set rekomendasi menjadi kosong
            $recommendedBooks = collect([]);
        } else {
            // Hitung preferensi berdasarkan kategori & tingkatan
            $preferences = [];
            foreach ($history as $item) {
                if ($item->buku) {
                    $key = $item->buku->kategori . '_' . $item->buku->tingkatan;
                    if (!isset($preferences[$key])) {
                        $preferences[$key] = 0;
                    }
                    $preferences[$key]++;
                }
            }

            // Ambil buku yang belum dibaca
            $readBookIds = $history->pluck('id_buku')->toArray();
            $unreadBooks = Buku::whereNotIn('id', $readBookIds)
                ->whereIn('kategori', ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'])
                ->get();

            // Hitung skor berdasarkan preferensi
            $recommendations = [];
            foreach ($unreadBooks as $book) {
                $key = $book->kategori . '_' . $book->tingkatan;
                $score = $preferences[$key] ?? 0;

                $recommendations[] = [
                    'book' => $book,
                    'score' => $score
                ];
            }

            // Urutkan dan ambil 4 teratas
            usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);
            $recommendedBooks = collect($recommendations)->pluck('book')->take(4);
        }

        // === BUKU POPULER ===
        $popularBooks = Buku::whereIn('kategori', ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'])
            ->select('buku.*', DB::raw('COUNT(counter_baca.id_buku) as total_views'))
            ->leftJoin('counter_baca', 'buku.id', '=', 'counter_baca.id_buku')
            ->groupBy('buku.id', 'buku.guru_id', 'buku.judul', 'buku.deskripsi', 'buku.kategori', 'buku.tingkatan', 'buku.thumb', 'buku.pdf', 'buku.date')
            ->orderByDesc('total_views')
            ->limit(4)
            ->get();

        return view('katalogbuku', [
            "title" => "Dashboard Siswa",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage(),
            "recommendedBooks" => $recommendedBooks,  // Rekomendasi berdasarkan histori
            "popularBooks" => $popularBooks,         // Buku populer berdasarkan views
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}


public function carikatalogbuku(Request $request)
{
    $tutorId = Cookie::get('user_id');
    $tutor = User::find($tutorId);

    if ($tutor) {
        $userName = $tutor->nama;
        $userImage = $tutor->image;
        $userProfesi = $tutor->email;

        $allowedCategories = ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'];

        if ($request->has('search')) {
            $keyword = $request->input('search');

            $contents = Buku::whereIn('kategori', $allowedCategories)
                ->where(function ($query) use ($keyword) {
                    $query->where('judul', 'like', '%' . $keyword . '%')
                        ->orWhere('kategori', 'like', '%' . $keyword . '%')
                        ->orWhere('tingkatan', 'like', '%' . $keyword . '%');
                })
                ->paginate(8);
        } else {
            $contents = Buku::whereIn('kategori', $allowedCategories)
                ->orderBy('date', 'DESC')
                ->paginate(8);
        }

        return view('caribuku', [
            "title" => "Dashboard Siswa",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage(),
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}


public function bookmarkview()
{
    $userId = Cookie::get('user_id'); // Ambil ID siswa dari cookie

    if (!$userId) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    $tutor = User::find($userId);
    if (!$tutor) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    $userName = $tutor->nama;
    $userImage = $tutor->image;
    $userProfesi = $tutor->email;

    $bookmarks = Bookmark::where('id_siswa', $userId)->get();

    $bookmarkedBooks = Buku::whereIn('id', $bookmarks->pluck('id_buku'))
                            ->paginate(8); // <-- paginate 8 data!

    return view('bookmarkbuku', [
        "title" => "Bookmark",
        "bookmarkedBooks" => $bookmarkedBooks,
        "bookmarks" => $bookmarks,
        "userName" => $userName,
        "userImage" => $userImage,
        "userProfesi" => $userProfesi,
        "userId" => $userId,
        "totalPages" => $bookmarkedBooks->lastPage(),
        "currentPage" => $bookmarkedBooks->currentPage(),
    ]);
}




public function toggleBookmark(Request $request, $id)
{
    $userId = Cookie::get('user_id'); // Ambil ID siswa dari cookie

    if (!$userId) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Cek apakah bookmark sudah ada
    $bookmark = Bookmark::where('id_siswa', $userId)->where('id_buku', $id)->first();

    if ($bookmark) {
        // Jika sudah di-bookmark, hapus
        $bookmark->delete();
        return redirect()->back()->with('success', 'Bookmark dihapus!');
    } else {
        // Jika belum, tambahkan
        Bookmark::create([
            'id_bookmark' => Str::random(20), // ID acak untuk bookmark
            'id_siswa' => $userId,
            'id_buku' => $id
        ]);
        return redirect()->back()->with('success', 'Berhasil di-bookmark!');
    }
}

public function historyview()
{
    $userId = Cookie::get('user_id'); // Ambil ID siswa dari cookie

    if (!$userId) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    $tutor = User::find($userId);
    if (!$tutor) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    $userName = $tutor->nama;
    $userImage = $tutor->image;
    $userProfesi = $tutor->email;

    $histories = Histori::where('id_siswa', $userId)->get();

    $historyBooks = Buku::whereIn('id', $histories->pluck('id_buku'))
                            ->paginate(8); // <-- paginate 8 data!

    return view('historybuku', [
        "title" => "History",
        "historyBooks" => $historyBooks,
        "histories" => $histories,
        "userName" => $userName,
        "userImage" => $userImage,
        "userProfesi" => $userProfesi,
        "userId" => $userId,
        "totalPages" => $historyBooks->lastPage(),
        "currentPage" => $historyBooks->currentPage(),
    ]);
}

 // Pastikan sudah use Rating

public function DetailBukusiswa($videoId)
{
    $tutorId = Cookie::get('user_id');
    if (!$tutorId) {
        return redirect()->route('loginnn');
    }

    // Tambah view ke counter baca
    Conterbaca::create([
        'id' => uniqid(),
        'id_buku' => $videoId,
        'id_siswa' => $tutorId,
        'date' => Carbon::now()->format('Y-m-d'),
    ]);

    Histori::create([
        'id' => uniqid(),
        'id_buku' => $videoId,
        'id_siswa' => $tutorId,
        'date' => Carbon::now()->format('Y-m-d'),
    ]);

    $tutors = User::find($tutorId);
    $userName = $tutors->nama;
    $userImage = $tutors->image;
    $userProfesi = $tutors->email;

    $content = Buku::find($videoId);
    if (!$content) {
        return redirect()->route('contentsp')->with('error', 'Buku tidak ditemukan!');
    }

    $comments = Comments::where('id_buku', $videoId)->get();
    $userIds = $comments->pluck('id_siswa')->unique();
    $users = User::whereIn('id', $userIds)->get();
    $isBookmarked = Bookmark::where('id_siswa', $tutorId)->where('id_buku', $videoId)->exists();
    $existingRating = Rating::where('id_siswa', $tutorId)->where('id_buku', $videoId)->value('rating') ?? 0;

    $jumlahView = Conterbaca::where('id_buku', $videoId)->count();

    // Tambahkan: Hitung rata-rata rating
    $averageRatingRaw = Rating::where('id_buku', $videoId)->avg('rating');
    $averageRating = round($averageRatingRaw * 2) / 2;


    return view('detailbukusiswa', compact(
        'content',
        'comments',
        'users',
        'isBookmarked',
        'jumlahView',
        'existingRating',
        'averageRating' // jangan lupa ini
    ), [
        "title" => "Detail Buku Siswa",
        "userName" => $userName,
        "userImage" => $userImage,
        "userProfesi" => $userProfesi,
        "userId" => $tutorId
    ]);
}



    public function storeCommentsiswa(Request $request, $videoId)
    {

        $tutorId = Cookie::get('user_id');
        $tutors = User::find($tutorId);
        $userid = $tutors->id;
        // Validasi data yang diterima dari formulir
        $validator = Validator::make($request->all(), [
            'content_id' => 'required|exists:contents,id',
            'comment_box' => 'required|max:1000',
        ]);
        $content = Buku::findOrFail($request->input('content_id'));
        // Simpan komentar ke dalam database
        $randomId = Str::random(20); // Misalnya, menghasilkan string random dengan panjang 10 karakter

        // Membuat komentar dengan menggunakan karakter random sebagai ID
        Comments::create([
            'id' => $randomId,
            'id_buku' => $request->input('content_id'),
            'id_siswa' => $userid,
            'comment' => $request->input('comment_box'),
            'date' => Carbon::now()->format('Y-m-d'),

        ]);

        // Redirect kembali ke halaman detailbukusp setelah komentar disimpan
        return redirect()->route('detailbukusiswa.content', ['videoId' => $videoId])
        ->with('success', 'Komentar berhasil ditambahkan!');
    }


    public function updateComment(Request $request, $id)
{
    $request->validate([
        'comment_box' => 'required|max:1000',
    ]);

    $comment = Comments::findOrFail($id);

    $userId = Cookie::get('user_id');
    $tutors = User::find($userId);

    if ($comment->id_siswa !== $tutors->id) {
        return redirect()->back()->with('error', 'Kamu tidak boleh edit komentar orang lain!');
    }

    $comment->comment = $request->comment_box;
    $comment->save();

    return redirect()->back()->with('success', 'Komentar berhasil diupdate!');
}

public function deleteComment($id)
{
    $comment = Comments::findOrFail($id);

    $userId = Cookie::get('user_id');
    $tutors = User::find($userId);

    if ($comment->id_siswa !== $tutors->id) {
        return redirect()->back()->with('error', 'Kamu tidak boleh hapus komentar orang lain!');
    }

    $comment->delete();

    return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
}





    public function storeRating(Request $request, $id)
{
    $userId = Cookie::get('user_id'); // Ambil ID siswa dari cookie

    if (!$userId) {
        return redirect()->route('logreg')->with('error', 'Silakan login terlebih dahulu.');
    }

    $rating = Rating::updateOrCreate(
        ['id_siswa' => $userId, 'id_buku' => $id],
        ['rating' => $request->rating]
    );

    return back();
}


public function halamanutama()
{
    // Ambil buku dengan kategori tertentu
    $contents = Buku::whereIn('kategori', ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'])
        ->orderBy('date', 'DESC')
        ->paginate(8);

    // Ambil buku populer berdasarkan jumlah baca
    $popularBooks = Buku::whereIn('kategori', ['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran'])
        ->select('buku.*', DB::raw('COUNT(counter_baca.id_buku) as total_views'))
        ->leftJoin('counter_baca', 'buku.id', '=', 'counter_baca.id_buku')
        ->groupBy('buku.id', 'buku.guru_id', 'buku.judul', 'buku.deskripsi', 'buku.kategori', 'buku.tingkatan', 'buku.thumb', 'buku.pdf', 'buku.date')
        ->orderByDesc('total_views')
        ->limit(4)
        ->get();

    return view('index', [
        "title" => "Dashboard Siswa",
        "contents" => $contents,
        "totalPages" => $contents->lastPage(),
        "currentPage" => $contents->currentPage(),
        "popularBooks" => $popularBooks,
    ]);
}


public function editsiswa()
    {
        // Ambil ID tutor dari cookie
        $siswaId = Cookie::get('user_id');

        // Temukan data tutor berdasarkan ID
        $siswa = User::find($siswaId);

        // Jika data tidak ditemukan, berikan pesan atau tindakan yang sesuai

        // Kirim data ke tampilan editpasien.blade.php
        $siswaImage = $siswa->image;
        $siswaName = $siswa->nama;
        $siswaProfesi = $siswa->mengampu;

        // Mengirim variabel $tutorId ke view
        return view('updateprofilsiswa', [
            "title" => "Profile User",
            "siswaImage" => $siswaImage,
            "siswaName" => $siswaName,
            "siswaId" => $siswaId,
            "siswaProfesi" => $siswaProfesi,
            "siswa" => $siswa // Memasukkan variabel $tutor ke dalam array untuk digunakan di dalam view
        ]);
    }

    public function updatesiswa(Request $request)
    {
        // Ambil ID tutor dari cookie
        $siswaId = Cookie::get('user_id');

        // Temukan data tutor berdasarkan ID
        $siswa = User::find($siswaId);

        // Validasi input
        $request->validate([
            'nama' => 'nullable|string',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_pass' => 'nullable|string',
            'new_pass' => 'nullable|string',
            'cpass' => 'nullable|string|same:new_pass',
        ]);

        // Proses update data tutor
        if ($request->filled('nama')) {
            $siswa->nama = $request->nama;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded_files'), $imageName);
            // Hapus gambar sebelumnya jika ada
            if (!empty($siswa->image)) {
                File::delete(public_path('uploaded_files/' . $siswa->image));
            }
            $siswa->image = $imageName;
        }

        if ($request->filled('old_pass') && $request->filled('new_pass')) {
            if (Hash::check($request->old_pass, $siswa->password)) {
                $siswa->password = Hash::make($request->new_pass);
            } else {
                return redirect()->back()->with('error', 'Password lama yang Anda masukkan salah');
            }
        }

        // Simpan perubahan
        $siswa->save();

        return redirect('profilesiswa')->with('success', 'Berhasil Memperbarui Profil!');
    }



}
