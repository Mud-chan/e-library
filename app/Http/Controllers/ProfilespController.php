<?php

// app/Http/Controllers/RegisterController.php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Guru;
use App\Models\Bookmark;
use App\Models\Histori;
// use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GMP;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Import class Hash

class ProfilespController extends Controller
{
    public function profilesp()
    {
        $tutorsId = Cookie::get('sp_id'); // Ambil ID pengguna dari cookie
        $tutors = Guru::find($tutorsId); // Temukan pengguna berdasarkan ID
        $userName = $tutors->nama; // Ambil nama pengguna
        $userImage = $tutors->image;
        $userProfesi = $tutors->mengampu;
        $totalTutors = Guru::count();

        // Hitung total user
        $totalUsers = User::count();
 // Ambil URL gambar profil pengguna

        return view('profilesp', [
            "title" => "Profile Admin",
            "userName" => $userName, // Teruskan nama pengguna ke tampilan
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "tutorsId" => $tutorsId,
            "totalTutors" => $totalTutors,
            "totalUsers" => $totalUsers
        ]);
    }

    public function profilesiswa()
    {
        $siswaId = Cookie::get('user_id'); // Ambil ID pengguna dari cookie
        $siswa = User::find($siswaId); // Temukan pengguna berdasarkan ID

        if (!$siswa) {
            return redirect()->back()->withErrors('User tidak ditemukan');
        }

        // Ambil data dari user
        $userName = $siswa->nama;
        $userImage = $siswa->image;
        $userProfesi = $siswa->kelas;

        // Hitung total bookmark dan histori dari siswa ini
        $totalBookmark = Bookmark::where('id_siswa', $siswaId)->count();
        $totalHistori = Histori::where('id_siswa', $siswaId)->count();

        return view('profilsiswa', [
            "title" => "Profile Siswa",
            "userName" => $userName,
            "userImage" => $userImage,
            "userProfesi" => $userProfesi,
            "siswaId" => $siswaId,
            "totalBookmark" => $totalBookmark,
            "totalHistori" => $totalHistori
        ]);
    }



    public function editsp()
    {
        // Ambil ID tutor dari cookie
        $tutorsId = Cookie::get('sp_id');

        // Temukan data tutor berdasarkan ID
        $tutor = Guru::find($tutorsId);

        // Jika data tidak ditemukan, berikan pesan atau tindakan yang sesuai


        $userImage = $tutor->image;
        $userName = $tutor->nama;
        $userProfesi = $tutor->kelas;

        // Mengirim variabel $tutorId ke view
        return view('updateprofilsp', [
            "title" => "Profile User",
            "userName" => $userName,
            "userImage" => $userImage,
            "tutorsId" => $tutorsId,
            "userProfesi" => $userProfesi,
            "tutor" => $tutor // Memasukkan variabel $tutor ke dalam array untuk digunakan di dalam view
        ]);
    }








    public function updatesp(Request $request)
    {
        // Ambil ID tutor dari cookie
        $tutorsId = $request->cookie('sp_id');

        // Temukan data tutor berdasarkan ID
        $tutor = Guru::find($tutorsId);

        // Validasi input
        $request->validate([
            'nama' => 'nullable|string',
            'mengampu' => 'nullable|string',
            'email' => 'nullable|email|unique:tutors,email,' . $tutorsId,
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_pass' => 'nullable|string',
            'new_pass' => 'nullable|string',
            'cpass' => 'nullable|string|same:new_pass',
        ]);

        // Proses update data tutor
        if ($request->filled('nama')) {
            $tutor->nama = $request->nama;
        }

        if ($request->filled('mengampu')) {
            $tutor->mengampu = $request->mengampu;
        }

        if ($request->filled('email')) {
            $tutor->email = $request->email;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded_files'), $imageName);
            // Hapus gambar sebelumnya jika ada
            if (!empty($tutor->image)) {
                File::delete(public_path('uploaded_files/' . $tutor->image));
            }
            $tutor->image = $imageName;
        }

        if ($request->filled('old_pass') && $request->filled('new_pass')) {
            if (Hash::check($request->old_pass, $tutor->password)) {
                $tutor->password = Hash::make($request->new_pass);
            } else {
                return redirect()->route('pages.profilesp')->with('error', 'Password lama yang Anda masukkan salah');
            }
        }

        // Simpan perubahan
        $tutor->save();

        return redirect()->route('pages.profilesp')->with('success', 'Berhasil Memperbarui Profil!');
    }






}




