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


class PagesControllerSp extends Controller
{
    public function index()
    {
        $tutorsId = Cookie::get('sp_id'); // Ambil ID pengguna dari cookie
        $tutors = Guru::find($tutorsId); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        return view('components.spheader', [
            "title" => "Dashboard Admin",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function dashboard()
{
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('sp_id');
    // Temukan data tutor berdasarkan ID
    $tutor = Guru::find($tutorId);
    if ($tutor) {
        $userName = $tutor->nama;
        $userImage = $tutor->image;
        $userProfesi = $tutor->mengampu;
        // Hitung total tutor
        $totalTutors = Guru::count();

        // Hitung total user
        $totalUsers = User::count();
        $siswa = User::all();
        // foreach ($siswa as $item) {
        //     $plays = Playlist::find($item->playlist_id);
        //     $item->playlist = $plays;
        // }
        // $dtlsiswa = Dtluser::all();
        // foreach ($dtlsiswa as $item) {
        //     $user = User::find($item->id_user);
        //     $plays = Playlist::find($item->playlist_id);
        //     $item->playlist = $plays;
        //     $item->user = $user;
        // }

        // Hitung total harga transaksi
        // $totalHargaTransaksi = Transaksi::join('playlist', 'transaksi.id_playlist', '=', 'playlist.id')
        //     ->sum('playlist.harga');

        // Hitung jumlah transaksi dengan status 'pending'
        // $jumlahTransaksiPending = Transaksi::join('dtl_user', 'transaksi.id_user', '=', 'dtl_user.id_user')
        // ->where('dtl_user.status', 'pending')
        // ->select('transaksi.id') // Select only the transaction IDs
        // ->distinct() // Ensure we count only distinct transactions
        // ->count();

        return view('dashboardsp', [
            "title" => "Dashboard Admin",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "totalTutors" => $totalTutors,
            "totalUsers" => $totalUsers,
            "siswa" => $siswa,
            // "totalHargaTransaksi" => $totalHargaTransaksi,
            // "jumlahTransaksiPending" => $jumlahTransaksiPending,
            // "dtlsiswa"=> $dtlsiswa
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}



    public function carisiswasp(Request $request)
{
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('sp_id');

    // Temukan data tutor berdasarkan ID
    $tutor = Guru::find($tutorId);

    if ($tutor) {
        $userName = $tutor->name;
        $userImage = $tutor->image;
        $userProfesi = $tutor->profession;

        // Hitung total tutor
        $totalTutors = Guru::count();

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
        return view('dashboardsp', [
            "title" => "Dashboard Admin",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "totalTutors" => $totalTutors,
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
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('user_id');
    // Temukan data tutor berdasarkan ID
    $tutor = User::find($tutorId);
    if ($tutor) {
        $userName = $tutor->nama;
        $userImage = $tutor->image;
        $userProfesi = $tutor->email;
        $contents = Buku::orderBy('date', 'DESC')->paginate(8);

        $popularBooks = Buku::select('buku.*', DB::raw('COUNT(counter_baca.id_buku) as total_views'))
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
            "popularBooks" => $popularBooks,

            // "totalHargaTransaksi" => $totalHargaTransaksi,
            // "jumlahTransaksiPending" => $jumlahTransaksiPending,
            // "dtlsiswa"=> $dtlsiswa
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}

public function carikatalogbuku(Request $request)
{
    // Ambil ID tutor dari cookie
    $tutorId = Cookie::get('user_id');
    // Temukan data tutor berdasarkan ID
    $tutor = User::find($tutorId);
    if ($tutor) {
        $userName = $tutor->nama;
        $userImage = $tutor->image;
        $userProfesi = $tutor->email;

        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');
            // Lakukan pencarian berdasarkan kriteria tertentu, misalnya nama siswa atau lainnya
            $contents = Buku::where('judul', 'like', '%' . $keyword . '%')
    ->orWhere('kategori', 'like', '%' . $keyword . '%')
    ->orWhere('tingkatan', 'like', '%' . $keyword . '%')
    ->paginate(8);

        } else {
            // Jika tidak ada pencarian, ambil semua konten
            $contents = Buku::orderBy('date', 'DESC')->paginate(8);
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

public function DetailBukusiswa($videoId)
{
    $tutorId = Cookie::get('user_id');
    if (!$tutorId) {
        return redirect()->route('logreg');
    }

    // Tambah view ke counter baca (selalu tambah, walau sudah pernah baca)
    Conterbaca::create([
        'id' => uniqid(), // pastikan kolom `id` tetap unik
        'id_buku' => $videoId,
        'id_siswa' => $tutorId,
        'date' => Carbon::now()->format('Y-m-d'),
    ]);

    Histori::create([
        'id' => uniqid(), // pastikan kolom `id` tetap unik
        'id_buku' => $videoId,
        'id_siswa' => $tutorId,
        'date' => Carbon::now()->format('Y-m-d'),
    ]);

    // Lanjutkan logic lainnya...
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

    return view('detailbukusiswa', compact('content', 'comments', 'users', 'isBookmarked', 'jumlahView', 'existingRating'), [
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


}
