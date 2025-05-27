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
use App\Models\Buku;
use GMP;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Import class Hash

class ProfileguruController extends Controller
{
    public function profileguru()
    {
        $tutorsId = Cookie::get('tutor_id'); // Ambil ID pengguna dari cookie
        $tutors = Guru::find($tutorsId); // Temukan pengguna berdasarkan ID
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image;
        $guruProfesi = $tutors->mengampu;
        $totalBuku = Buku::count();

        // Hitung total user
        $totalUsers = User::count();
 // Ambil URL gambar profil pengguna

        return view('profileguru', [
            "title" => "Profile Guru",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "tutorsId" => $tutorsId,
            "totalBuku" => $totalBuku,
            "totalUsers" => $totalUsers
        ]);
    }





    public function editguru()
    {
        // Ambil ID tutor dari cookie
        $guruId = Cookie::get('tutor_id');

        // Temukan data tutor berdasarkan ID
        $tutor = Guru::find($guruId);

        // Jika data tidak ditemukan, berikan pesan atau tindakan yang sesuai


        $guruImage = $tutor->image;
        $guruName = $tutor->nama;
        $guruProfesi = $tutor->kelas;

        // Mengirim variabel $tutorId ke view
        return view('updateprofilguru', [
            "title" => "Profile Guru",
            "guruName" => $guruName,
            "guruImage" => $guruImage,
            "guruId" => $guruId,
            "guruProfesi" => $guruProfesi,
            "tutor" => $tutor // Memasukkan variabel $tutor ke dalam array untuk digunakan di dalam view
        ]);
    }








    public function updateguru(Request $request)
    {
        // Ambil ID tutor dari cookie
        $guruId = $request->cookie('tutor_id');

        // Temukan data tutor berdasarkan ID
        $tutor = Guru::find($guruId);

        // Validasi input
        $request->validate([
            'nama' => 'nullable|string',
            'mengampu' => 'nullable|string',
            'email' => 'nullable|email|unique:tutors,email,' . $guruId,
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
                return redirect()->route('pages.profileguru')->with('error', 'Password lama yang Anda masukkan salah!');
            }
        }

        // Simpan perubahan
        $tutor->save();

        return redirect()->route('pages.profileguru')->with('success', 'Berhasil memperbarui Profil!');
    }






}




