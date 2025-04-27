<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use App\Models\Buku;
// use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\Peminjaman;
use App\Models\Dtl_Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TutorController extends Controller
{
    public function index()
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;
        $playlists = Guru::where('role', 'guru')->paginate(8);
        return view('viewtutor', [
            "title" => "Data Tutors",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "playlists" => $playlists,
            "totalPages" => $playlists->lastPage(),
            "currentPage" => $playlists->currentPage()
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function landtutor()
    {
        $playlists = Guru::where('role', 'guru')->get();
        $materi = Buku::all();
        foreach ($materi as $mat) {
            $tutor = Guru::find($mat->guru_id);
            $mat->tutor = $tutor;
        }

        // $materibegin = Playlist::where('tingkatan', 'beginer')->get();
        // foreach ($materibegin as $matbe) {
        //     $tutor = Tutors::find($matbe->tutor_id);
        //     $matbe->tutor = $tutor;
        // }

        // $materiin = Playlist::where('tingkatan', 'intermiadtel')->get();
        // foreach ($materiin as $matin) {
        //     $tutor = Tutors::find($matin->tutor_id);
        //     $matin->tutor = $tutor;
        // }

        // $materiad = Playlist::where('tingkatan', 'Advenced')->get();
        // foreach ($materiad as $matad) {
        //     $tutor = Tutors::find($matad->tutor_id);
        //     $matad->tutor = $tutor;
        // }
        return view('index', [
            "playlists" => $playlists,
            "materi" => $materi,
            // "materibegin" => $materibegin,
            // "materiin" => $materiin,
            // "materiad" => $materiad,
        ]);
    }


    // public function detailcor($id)
    // {
    //     $course = Playlist::find($id);
    //     $tutor = Tutors::find($course->tutor_id);
    //     $contents = Content::where('playlist_id', $id)->get();

    //     return view('detailcourses', [
    //         'course' => $course,
    //         'tutor' => $tutor,
    //         'contents' => $contents,
    //     ]);
    // }





    public function caritutor(Request $request)
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        // Ambil semua tutor
        $playlists = Guru::where('role', 'guru');

        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $playlists->where('nama', 'like', '%' . $keyword . '%');
        }

        // Ambil data tutor sesuai dengan kriteria pencarian
        $playlists = $playlists->paginate(5);

        return view('viewtutor', [
            "title" => "Data Tutors",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "playlists" => $playlists,
            "totalPages" => $playlists->lastPage(),
            "currentPage" => $playlists->currentPage()

            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }
    public function tambahtutor()
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        return view('add_guru', [
            "title" => "Tambah Tutor",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }
    public function storetutor(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:guru,email',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|string',
            'mengampu' => 'required|string',
        ]);

        $imageName = null;

        // Upload thumbnail jika ada
        if ($request->hasFile('image')) {
            $thumb = $request->file('image');
            $imageName = time() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploaded_files'), $imageName);
        }


        $id = uniqid();

        // Buat pengguna baru
        Guru::create([
            'id' => $id,
            'nama' => $request->input('nama'),
            'mengampu' => $request->input('mengampu'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'image' => $imageName,
            'role' => $request->input('role'),

        ]);

        return redirect()->route('tutor.index')->with('success', 'Tutor berhasil ditambahkan.');
    }
    public function edittutor($id)
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        $playlists = Guru::find($id);
        return view('update_guru', [
            "title" => "Edit Tutor",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "playlists" => $playlists,
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }
    public function updatetutor(Request $request, $guruId)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:guru,email,' . $guruId,
            'old_pass' => 'nullable|string',
            'new_pass' => 'nullable|string',
            'cpass' => 'nullable|string|same:new_pass',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|string',
            'mengampu' => 'required|string',
        ]);

        // Temukan pengguna berdasarkan ID
        $tutor = Guru::find($guruId);

        try {
            // Ambil data siswa
            $guru = Guru::findOrFail($guruId);
            Log::info("Data siswa ditemukan: ", $guru->toArray());

            // Update data dasar
            $guru->nama = $request->nama;
            $guru->email = $request->email;
            $guru->mengampu = $request->mengampu;
            $guru->role = $request->role;
            Log::info("Data dasar siswa berhasil di-set");

            // Update gambar jika ada
            if ($request->hasFile('image')) {
                $imagename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploaded_files'), $imagename);
                $guru->image = $imagename;
            } elseif (!$request->hasFile('image') && $guru->image) {
                // If thumbnail is not uploaded and there is an existing thumbnail, keep the existing one
                $imagename = $guru->image;
            }

            // Update password jika diminta
            if ($request->filled('old_pass') && $request->filled('new_pass')) {
                if (Hash::check($request->old_pass, $guru->password)) {
                    $guru->password = Hash::make($request->new_pass);
                    Log::info("Password siswa berhasil diperbarui.");
                } else {
                    Log::warning("Gagal memperbarui password: password lama salah.");
                    return redirect()->back()->with('error', 'Password lama yang Anda masukkan salah.');
                }
            }

            // Simpan semua perubahan
            $guru->save();
            Log::info("Data siswa berhasil disimpan ke database.");

            return redirect()->route('tutor.index')->with('success', 'Data Guru berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui data siswa: ' . $e->getMessage());
            return redirect()->back()->with('errorup', 'Guru memperbarui data siswa: ' . $e->getMessage());
        }
    }


    public function deletetutor(Request $request)
    {
        $id = $request->input('id'); // ambil ID dari form POST

        // Temukan guru berdasarkan ID
        $tutor = Guru::find($id);

        if (!$tutor) {
            return redirect()->route('viewtutor')->with('error', 'Tutor tidak ditemukan.');
        }

        // Hapus semua buku yang dimiliki guru ini
        foreach ($tutor->buku as $buku) {
            // Hapus thumbnail jika ada
            if ($buku->thumb) {
                Storage::delete('uploaded_files/' . $buku->thumb);
            }

            // Hapus file PDF jika ada
            if ($buku->pdf) {
                Storage::delete('uploaded_files/' . $buku->pdf);
            }

            // Hapus data buku dari database
            $buku->delete();
        }

        // Hapus gambar guru jika ada
        if ($tutor->image) {
            Storage::delete('public/images/' . $tutor->image);
        }

        // Hapus guru
        $tutor->delete();

        return redirect()->route('tutor.index')->with('success', 'Tutor dan semua data terkait berhasil dihapus.');
    }



}
