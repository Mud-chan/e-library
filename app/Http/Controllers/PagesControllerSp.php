<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Guru;
use App\Models\Buku;
use App\Models\Dtl_Siswa;
use App\Models\Comments;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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
        $contents = Buku::orderBy('date', 'DESC')->paginate(7);


        return view('katalogbuku', [
            "title" => "Dashboard Siswa",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()

            // "totalHargaTransaksi" => $totalHargaTransaksi,
            // "jumlahTransaksiPending" => $jumlahTransaksiPending,
            // "dtlsiswa"=> $dtlsiswa
        ]);
    } else {
        return redirect()->route('loginnn');
    }
}

public function DetailBukusiswa($videoId)
{
    $tutorId = Cookie::get('user_id');
    if (!$tutorId) {
        return redirect()->route('logreg');
    }

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

    return view('detailbukusiswa', compact('content', 'comments', 'users'), [
        "title" => "Detail Buku Siswa",
        "userName" => $userName,
        "userImage" => $userImage,
        "userProfesi" => $userProfesi,
        "userId" => $tutorId // penting ini, buat perbandingan user login
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

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
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


}
