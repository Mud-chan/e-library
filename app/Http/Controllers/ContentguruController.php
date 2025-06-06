<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Guru;
use App\Models\Buku;
// use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

use App\Models\Comments;
use App\Models\Conterbacaguru;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Bus;

class ContentguruController extends Controller
{
    public function index()
    {
        $tutor_id = Cookie::get('tutor_id');
        $tutors = Guru::find($tutor_id);
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;

        if (!$tutor_id) {
            return redirect()->route('logreg'); // Redirect to login if tutor_id is not set
        }

        $contents = Buku::orderBy('date', 'DESC')->paginate(8);


        return view('contentguru', compact('contents'), [
            "title" => "Buku",
           "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
        ]);
    }

    public function caricontentguru(Request $request)
    {
        $tutor_id = Cookie::get('tutor_id');

        // Periksa apakah tutor_id tersedia
        if (!$tutor_id) {
            return redirect()->route('logreg'); // Redirect ke halaman login jika tutor_id tidak diatur
        }

        // Ambil data tutor
        $tutors = Guru::find($tutor_id);
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;

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

        return view('contentguru', compact('contents'), [
            "title" => "Content Admin",
           "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
        ]);
    }

    public function deletebukuguru(Request $request)
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



    public function showAddContentFormGuru()
    {
        $tutor_id = Cookie::get('tutor_id');
        $tutors = Guru::find($tutor_id);
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;
        if (!$tutor_id) {
            return redirect()->route('login'); // Redirect to login if tutor_id is not set
        }

        $playlists = Buku::where('guru_id', $tutor_id)->get();

        return view('add_content_guru', [
            'playlists' => $playlists,
            "title" => "Tambah Buku",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
        ]);
    }





public function uploadContentGuru(Request $request)
{
    $tutor_id = Cookie::get('tutor_id');
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

        return redirect()->route('contentguru.index')->with('success', 'Buku Baru Berhasil Di Tambahkan');
    } catch (\Exception $e) {
        Log::error('Failed to upload content: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Buku Gagal Di Tambahkan: ' . $e->getMessage());
    }
}



    public function updateContentFormGuru($videoId)
    {
        $tutorId = Cookie::get('tutor_id');
        $tutors = Guru::find($tutorId);
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;
        if (!$tutorId) {
            return redirect()->route('logreg'); // Redirect to login if tutor_id is not set
        }

        $content = Buku::where('id', $videoId)
            ->where('guru_id', $tutorId)
            ->first();

        if (!$content) {
            return redirect()->route('contentguru.index')->with('errorup', 'Anda Tidak Memiliki Hak Upadte karena Bukan Anda Yang Menguploadnya!: ');
        }

        // Load the playlists associated with the tutor
        $playlists = Buku::where('guru_id', $tutorId)->get();

        // Render the update content form view with the $content data and playlists
        return view('update_content_guru', compact('content', 'playlists'), [
            "title" => "Buku Guru",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }


    public function updateContentGuru(Request $request, $videoId)
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

            return redirect()->route('contentguru.index')->with('sucesup', 'Materi Berhasil Di Perbarui!');
        } catch (\Exception $e) {
            Log::error('Failed to update content: ' . $e->getMessage());
            return redirect()->back()->with('errorup', 'Materi Gagal Di Perbarui!: ' . $e->getMessage());
        }
    }




    public function DetailBukuFormGuru($videoId)
    {
        $tutorId = Cookie::get('tutor_id');
        $tutors = Guru::find($tutorId);
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;
        if (!$tutorId) {
            return redirect()->route('logreg'); // Redirect to login if tutor_id is not set
        }

        Conterbacaguru::create([
        'id' => uniqid(),
        'id_buku' => $videoId,
        'id_guru' => $tutorId,
        'date' => Carbon::now()->format('Y-m-d'),
        ]);

        $content = Buku::find($videoId);

        if (!$content) {
            return redirect()->route('contentguru.index')->with('error', 'Video not found!');
        }

        // Load the playlists associated with the tutor
        $playlists = Buku::where('guru_id', $tutorId)->get();

        $comments = Comments::where('id_buku', $videoId)->get();
        $userIds = $comments->pluck('id_siswa')->unique();
        $users = User::whereIn('id', $userIds)->get();
        $gurus = Guru::whereIn('id', $userIds)->get();
        $allUsers = $users->concat($gurus);
        return view('detailbukuguru', compact('content', 'playlists', 'comments', 'users', 'gurus', 'userIds', 'allUsers'), [
            "title" => "Content Admin",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            'comments' => $comments,
            'userIds' => $userIds,
            'allUsers' => $allUsers,
            'users' => $users,
            'gurus' => $gurus,
            "userId" => $tutorId,
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function storeCommentGuru(Request $request, $videoId)
    {

        $tutor_id = Cookie::get('tutor_id');
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
        return redirect()->route('detailbukuguru.content', ['videoId' => $videoId])
        ->with('success', 'Komentar berhasil ditambahkan!');
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
        return redirect()->route('detailbukusp.content', ['videoId' => $videoId])
        ->with('success', 'Komentar berhasil ditambahkan!');
    }





    public function updateCommentGuru(Request $request, $id)
{
    $request->validate([
        'comment_box' => 'required|max:1000',
    ]);

    $comment = Comments::findOrFail($id);

    $guruId = Cookie::get('tutor_id');
    $tutors = Guru::find($guruId);

    if ($comment->id_siswa !== $tutors->id) {
        return redirect()->back()->with('error', 'Kamu tidak boleh edit komentar orang lain!');
    }

    $comment->comment = $request->comment_box;
    $comment->save();

    return redirect()->back()->with('success', 'Komentar berhasil diupdate!');
}

public function updateCommentSp(Request $request, $id)
{
    $request->validate([
        'comment_box' => 'required|max:1000',
    ]);

    $comment = Comments::findOrFail($id);

    $guruId = Cookie::get('sp_id');
    $tutors = Guru::find($guruId);

    if ($comment->id_siswa !== $tutors->id) {
        return redirect()->back()->with('error', 'Kamu tidak boleh edit komentar orang lain!');
    }

    $comment->comment = $request->comment_box;
    $comment->save();

    return redirect()->back()->with('success', 'Komentar berhasil diupdate!');
}

public function deleteCommentGuru($id)
{
    $comment = Comments::findOrFail($id);

    $guruId = Cookie::get('tutor_id');
    $tutors = Guru::find($guruId);

    if ($comment->id_siswa !== $tutors->id) {
        return redirect()->back()->with('error', 'Kamu tidak boleh hapus komentar orang lain!');
    }

    $comment->delete();

    return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
}



}
