<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Content;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use App\Models\Likes;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;
        $contents = User::paginate(8);
        return view('viewsiswa', [
            "title" => "Data Tutors",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function carisiswa(Request $request)
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;

        // Ambil semua siswa
        $contents = User::query();

        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $contents->where('nama', 'like', '%' . $keyword . '%')->paginate(8);
        }

        // Ambil data siswa sesuai dengan kriteria pencarian
        $contents = $contents->paginate(8);

        return view('viewsiswa', [
            "title" => "Data Siswa",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }


    public function showAddSiswaform()
    {
        $tutor_id = Cookie::get('sp_id');
        $tutors = Guru::find($tutor_id);
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image; // Ambil URL gambar profil pengguna
        $userProfesi = $tutors->mengampu;
        if (!$tutor_id) {
            return redirect()->route('login'); // Redirect to login if tutor_id is not set
        }


        return view('add_siswa', [
            "title" => "Tambah Siswa",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi
        ]);
    }

    public function uploadsiswa(Request $request)
{
    $tutor_id = Cookie::get('sp_id');
    if (!$tutor_id) {
        return redirect()->route('login');
    }

    // Validasi input
    $request->validate([
        'nama' => 'required|max:100',
        'email' => 'required|max:1000',
        'password' => 'required|string|min:6|confirmed',
        'kelas' => 'required|max:100',
        'jenis_kelamin' => 'required|max:100',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
        Log::info('Uploaded Content Request Data: ', $request->all());

        $id = uniqid(); // pakai UUID untuk id unik
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $kelas = $request->input('kelas');
        $jenis_kelamin =  $request->input('jenis_kelamin');


        $imageName = null;

        // Upload thumbnail jika ada
        if ($request->hasFile('image')) {
            $thumb = $request->file('image');
            $imageName = time() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploaded_files'), $imageName);
        }



        Log::info('Sebelum create Siswa');

        User::create([
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'kelas' => $kelas,
            'jenis_kelamin' => $jenis_kelamin,
            'image' => $imageName,
        ]);

        Log::info('Sesudah create Siswa');

        return redirect()->route('siswa.index')->with('success', 'Siswa Baru Berhasil Di Tambahkan');
    } catch (\Exception $e) {
        Log::error('Failed to upload content: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Siswa Gagal Di Tambahkan: ' . $e->getMessage());
    }
}

public function delete(Request $request)
    {
        $delete_id = $request->input('id');
        $content = User::find($delete_id);

        if ($content) {

            $content->delete();
            $content->delete();

            $message = 'Video deleted!';
        } else {
            $message = 'Video not found or already deleted!';
        }

        return redirect()->back()->with('message', $message);
    }

    public function updateSiswaForm($siswaId)
    {
        $tutorId = Cookie::get('sp_id');

        // Cek login tutor
        if (!$tutorId) {
            return redirect()->route('logreg'); // Redirect to login jika belum login
        }

        // Ambil data tutor untuk ditampilkan di header/dashboard
        $tutor = Guru::find($tutorId);
        $userName = $tutor->nama;
        $userImage = $tutor->image;
        $userProfesi = $tutor->mengampu;

        // Ambil data siswa berdasarkan ID
        $siswa = User::where('id', $siswaId)->first();

        if (!$siswa) {
            return redirect()->route('viewsiswa')->with('error', 'Siswa tidak ditemukan!');
        }

        // Tampilkan form update siswa
        return view('update_siswa', [
            'siswa' => $siswa,
            'title' => 'Update Siswa',
            'userName' => $userName,
            'userImage' => $userImage,
            'userProfesi' => $userProfesi,
        ]);
    }
    public function updateSiswa(Request $request, $siswaId)
    {
        Log::info("Memulai proses update data siswa dengan ID: {$siswaId}");

        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'email' => 'required|email|max:1000',
            'old_pass' => 'nullable|string',
            'new_pass' => 'nullable|string',
            'cpass' => 'nullable|string|same:new_pass',
            'kelas' => 'required|max:100',
            'jenis_kelamin' => 'required|max:100',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            Log::warning("Validasi gagal", $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }



        try {
            // Ambil data siswa
            $siswa = User::findOrFail($siswaId);
            Log::info("Data siswa ditemukan: ", $siswa->toArray());

            // Update data dasar
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->kelas = $request->kelas;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            Log::info("Data dasar siswa berhasil di-set");

            // Update gambar jika ada
            if ($request->hasFile('image')) {
                $imagename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploaded_files'), $imagename);
                $siswa->image = $imagename;
            } elseif (!$request->hasFile('image') && $siswa->image) {
                // If thumbnail is not uploaded and there is an existing thumbnail, keep the existing one
                $imagename = $siswa->image;
            }

            // Update password jika diminta
            if ($request->filled('old_pass') && $request->filled('new_pass')) {
                if (Hash::check($request->old_pass, $siswa->password)) {
                    $siswa->password = Hash::make($request->new_pass);
                    Log::info("Password siswa berhasil diperbarui.");
                } else {
                    Log::warning("Gagal memperbarui password: password lama salah.");
                    return redirect()->back()->with('error', 'Password lama yang Anda masukkan salah.');
                }
            }

            // Simpan semua perubahan
            $siswa->save();
            Log::info("Data siswa berhasil disimpan ke database.");

            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui data siswa: ' . $e->getMessage());
            return redirect()->back()->with('errorup', 'Gagal memperbarui data siswa: ' . $e->getMessage());
        }
    }




}
