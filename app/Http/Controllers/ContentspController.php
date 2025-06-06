<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Guru;
use App\Models\Buku;
// use App\Models\Playlist;
use App\Models\Conterbaca;
use Illuminate\Http\Request;
use App\Models\Histori;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
// use App\Models\Likes;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Bus;

class ContentspController extends Controller
{
    public function index()
    {
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id);
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        if (!$tutor_id) {
            return redirect()->route('logreg'); // Redirect to login if tutor_id is not set
        }

        $contents = Buku::orderBy('date', 'DESC')->paginate(8);


        return view('contentsp', compact('contents'), [
            "title" => "Buku",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
        ]);
    }

    public function caricontentsp(Request $request)
    {
        $tutor_id = Cookie::get('sp_id');

        // Periksa apakah tutor_id tersedia
        if (!$tutor_id) {
            return redirect()->route('logreg'); // Redirect ke halaman login jika tutor_id tidak diatur
        }

        // Ambil data tutor
        $tutors = Guru::find($tutor_id);
        $userName = $tutors->nama;
        $userImage = $tutors->image;
        $userProfesi = $tutors->mengampu;

        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $contents = Buku::where('judul', 'LIKE', "%$keyword%")
                ->orderBy('date', 'DESC')
                ->paginate(8);
        } else {
            $contents = Buku::where('guru_id', $tutor_id)
                ->orderBy('date', 'DESC')
                ->paginate(8);
        }

        return view('contentsp', compact('contents'), [
            "title" => "Content Admin",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
        ]);
    }

    public function delete(Request $request)
    {
        $delete_id = $request->input('id');
        $content = Buku::find($delete_id);

        if ($content) {
            // 1. Hapus semua likes yang terkait dengan content yang akan dihapus
            $likes = Bookmark::where('id_buku', $delete_id);
            $likes->delete(); // Eksekusi delete

            // 2. Hapus semua comments yang terkait dengan content yang akan dihapus
            $com = Comments::where('id_buku', $delete_id);
            $com->delete(); // Eksekusi delete

            // 3. Hapus materi itu sendiri, jika file ada
            $thumbPath = public_path('uploaded_files/' . $content->thumb);
            $videoPath = public_path('uploaded_files/' . $content->pdf);

            // Hapus file jika ada
            if (file_exists($thumbPath)) {
                unlink($thumbPath);
            }

            if (file_exists($videoPath)) {
                unlink($videoPath);
            }

            // Hapus record Buku itu sendiri
            $content->delete();

            $message = 'Video deleted!';
        } else {
            $message = 'Video not found or already deleted!';
        }

        return redirect()->back()->with('message', $message);
    }



    public function showAddContentForm()
    {
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id);
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;
        if (!$tutor_id) {
            return redirect()->route('login'); // Redirect to login if tutor_id is not set
        }

        $playlists = Buku::where('guru_id', $tutor_id)->get();

        return view('add_content', [
            'playlists' => $playlists,
            "title" => "Tambah Content",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi
        ]);
    }





public function uploadContent(Request $request)
{
    $tutor_id = Cookie::get('sp_id');
    if (!$tutor_id) {
        return redirect()->route('login');
    }

    // Validasi input
    $request->validate([
        'judul' => 'required|max:100',
        'deskripsi' => 'required|max:1000',
        'kategori' => 'required|max:100',
        'tingkatan' => 'nullable|string|max:100',
        'thumb' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        'pdf' => 'nullable|file|mimes:pdf|max:50120',
    ]);

    try {
        Log::info('Uploaded Content Request Data: ', $request->all());

        $id = uniqid(); // pakai UUID untuk id unik
        $title = $request->input('judul');
        $description = $request->input('deskripsi');
        $kategori = $request->input('kategori');
        $tingkatan = $request->input('tingkatan');
        $date = now()->format('Y-m-d');

        $thumbName = null;
        $pdfName = null;

        // Upload thumbnail jika ada
        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumbName = time() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploaded_files'), $thumbName);
        }

        // Upload PDF jika ada
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');

            if ($pdf->getClientOriginalExtension() !== 'pdf') {
                return back()->withErrors(['pdf' => 'File yang diunggah harus berformat PDF.']);
            }

            $pdfName = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('uploaded_files'), $pdfName);
        }

        Log::info('Sebelum create Buku');

        Buku::create([
            'id' => $id,
            'guru_id' => $tutor_id,
            'judul' => $title,
            'deskripsi' => $description,
            'kategori' => $kategori,
            'tingkatan' => $tingkatan,
            'thumb' => $thumbName,
            'pdf' => $pdfName,
            'date' => $date,
        ]);

        Log::info('Sesudah create Buku');

        return redirect()->route('contentsp.index')->with('success', 'Buku Baru Berhasil Di Tambahkan');
    } catch (\Exception $e) {
        Log::error('Failed to upload content: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Buku Gagal Di Tambahkan: ' . $e->getMessage());
    }
}



    public function updateContentForm($videoId)
    {
        $tutorId = Cookie::get('sp_id');
        $tutors = Guru::find($tutorId);
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;
        if (!$tutorId) {
            return redirect()->route('logreg'); // Redirect to login if tutor_id is not set
        }

        $content = Buku::where('id', $videoId)
            ->first();

        // if (!$content) {
        //     return redirect()->route('contentsp')->with('error', 'Video not found!');
        // }

        // Load the playlists associated with the tutor
        // $playlists = Buku::where('guru_id', $tutorId)->get();

        // Render the update content form view with the $content data and playlists
        return view('update_content', compact('content'), [
            "title" => "Content Admin",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }


    public function updateContent(Request $request, $videoId)
    {
        // Validation rules
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required|max:1000',
            'kategori' => 'required|max:100',
            'tingkatan' => 'nullable|string|max:100',
            'thumb' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'pdf' => 'nullable|file|mimes:pdf|max:50120',
        ]);

        try {
            // Find the content by ID
            $content = Buku::findOrFail($videoId);

            // Update content properties
            $content->kategori = $request->kategori;
            $content->judul = $request->judul;
            $content->deskripsi = $request->deskripsi;
            $content->tingkatan = $request->tingkatan;
            // $content->guru = $request->playlist;

            // Check if thumbnail is uploaded
            if ($request->hasFile('thumb')) {
                $thumbName = time() . '.' . $request->thumb->extension();
                $request->thumb->move(public_path('uploaded_files'), $thumbName);
                $content->thumb = $thumbName;
            } elseif (!$request->hasFile('thumb') && $content->thumb) {
                // If thumbnail is not uploaded and there is an existing thumbnail, keep the existing one
                $thumbName = $content->thumb;
            }

            // Check if video is uploaded
            if ($request->hasFile('pdf')) {
                $videoName = time() . '.' . $request->pdf->extension();
                $request->pdf->move(public_path('uploaded_files'), $videoName);
                $content->pdf = $videoName;
            } elseif (!$request->hasFile('pdf') && $content->pdf) {
                // If video is not uploaded and there is an existing video, keep the existing one
                $videoName = $content->pdf;
            }

            // Save the updated content
            $content->save();

            return redirect()->route('contentsp.index')->with('sucesup', 'Materi Berhasil Di Perbarui!');
        } catch (\Exception $e) {
            Log::error('Failed to update content: ' . $e->getMessage());
            return redirect()->back()->with('errorup', 'Materi Gagal Di Perbarui!: ' . $e->getMessage());
        }
    }




    public function DetailBukuForm(Request $request, $videoId)
{
    $tutorId = Cookie::get('sp_id');
    if (!$tutorId) {
        return redirect()->route('logreg');
    }

    $tutors = Guru::find($tutorId);
    $userName = $tutors->nama;
    $userImage = $tutors->image;
    $userProfesi = $tutors->mengampu;

    $content = Buku::where('id', $videoId)
        ->where('guru_id', $tutorId)
        ->first();

    if (!$content) {
        return redirect()->route('contentsp.index')->with('error', 'Buku tidak ditemukan!');
    }

    $playlists = Buku::where('guru_id', $tutorId)->get();
    $comments = Comments::where('id_buku', $videoId)->get();
    $userIds = $comments->pluck('id_siswa')->unique();
    $users = User::whereIn('id', $userIds)->get();
    $gurus = Guru::whereIn('id', $userIds)->get();
    $allUsers = $users->concat($gurus);
    $search = $request->query('search');
    $tingkatanBuku = $content->tingkatan; // contoh: 'Umum', 'Kelas 1', dst

    // Mulai query siswa
    $query = User::query();

    // Filter siswa jika tingkatan bukan 'Umum'
    if (strtolower($tingkatanBuku) !== 'umum') {
        $query->where('kelas', $tingkatanBuku);
    }

    // Tambahkan pencarian nama atau kelas jika ada input search
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('kelas', 'like', "%$search%");
        });
    }

    // Ambil daftar siswa hasil filter
    $filteredSiswa = $query->get();

    // Ambil ID siswa yang sudah membaca buku ini dari histori
    $historiSiswaIds = Histori::where('id_buku', $videoId)->pluck('id_siswa')->toArray();

    // Bangun data status baca
    $siswaStatus = $filteredSiswa->map(function ($siswa) use ($historiSiswaIds) {
        return [
            'id' => $siswa->id,
            'nama' => $siswa->nama,
            'kelas' => $siswa->kelas,
            'status' => in_array($siswa->id, $historiSiswaIds) ? 'Sudah Baca' : 'Belum Baca'
        ];
    });

    $jumlahView = Conterbaca::where('id_buku', $videoId)->count();
    $jumlahBookmark = Bookmark::where('id_buku', $videoId)->count();

    return view('detailbukusp', compact(
        'content',
        'playlists',
        'comments',
        'users',
        'userIds',
        'gurus',
        'allUsers',
        'userName',
        'userImage',
        'userProfesi',
        'siswaStatus',
        'jumlahView',
        'jumlahBookmark',
    ), [
        "title" => "Detail Buku",
        "userName" => $userName,
        "userImage" => $userImage,
        "userProfesi" => $userProfesi,
        'comments' => $comments,
        'userIds' => $userIds,
        'allUsers' => $allUsers,
        'users' => $users,
        'gurus' => $gurus,
        "userId" => $tutorId,
    ]);
}





    public function commentsAd()
    {
        // Ambil tutor_id dari cookie
        $tutor_id = request()->cookie('tutor_id');
        $tutors = Guru::find($tutor_id);
        $userName = $tutors->name; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->profession;

        // Periksa apakah tutor_id tersedia
        if ($tutor_id) {
            // Dapatkan semua komentar yang terkait dengan tutor_id tersebut
            $comments = Comments::where('tutor_id', $tutor_id)->orderBy('date', 'DESC')->paginate(10);
            $playlist = Buku::where('id' . $comments);

            // Ambil nama pengguna untuk setiap komentar
            foreach ($comments as $comment) {
                $comment->user_name = User::find($comment->user_id)->name;
                $comment->materi_name = Buku::find($comment->content_id)->title;
            }

            // Kirim data komentar ke view
            return view('commentsad', compact('comments'), [
                'tutor_id' => $tutor_id,
                "title" => "Comments",
                "userName" => $userName, // Teruskan nama pengguna ke tampilan
                "userImage" => $userImage,
                "userProfesi" => $userProfesi,
                "totalPages" => $comments->lastPage(),
                "currentPage" => $comments->currentPage()
            ]);
        } else {
            // Redirect ke halaman login jika tutor_id tidak tersedia di cookie
            return redirect()->route('logreg');
        }
    }


    public function storeComment(Request $request, $videoId)
    {

        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id);
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
        return redirect()->route('detailbukusp.content', ['videoId' => $videoId])
        ->with('success', 'Komentar berhasil ditambahkan!');
    }





    public function deleteComment(Request $request)
    {
        $delete_id = $request->comment_id;

        $comment = Comments::find($delete_id);
        if (!$comment) {
            return redirect()->back()->with('error', 'Komentar tidak ditemukan!');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus komentar!');
    }



}
