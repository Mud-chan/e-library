<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash; // Import class Hash
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $request->email)->first();
            $tutor = Guru::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                Cookie::queue('user_id', $user->id, 4320);
                return redirect()->intended('/katalogbuku');
            } elseif ($tutor && Hash::check($request->password, $tutor->password)) {
                if ($tutor->role === 'guru') {
                    Cookie::queue('tutor_id', $tutor->id, 4320);
                    return redirect()->intended('/dashboardguru');
                } elseif ($tutor->role === 'superadmin') {
                    Cookie::queue('sp_id', $tutor->id, 4320);
                    return redirect()->intended('/dashboardsp');
                } else {
                    return redirect()->back()->with('error', 'Email belum terdaftar');
                }
            } else {
                return redirect()->back()->with('error', 'Kesalahan pada Email dan/atau Password');
            }
        }
    }

    public function updatePassword(Request $request)
{
    // Cek apakah email ada di tabel User
    $user = User::where('email', $request->email)->first();

    if ($user) {
        // Update password user
        $user->password = Hash::make($request->password);
        $user->save();
        // Redirect ke halaman login setelah berhasil mengupdate password
        return redirect()->intended('/login');

    }

    // Jika email tidak ditemukan di tabel User, cek di tabel Tutors
    $tutor = Guru::where('email', $request->email)->first();

    if ($tutor) {
        // Update password tutor
        $tutor->password = Hash::make($request->password);
        $tutor->save();
        // Redirect ke halaman login setelah berhasil mengupdate password
        return redirect()->intended('/logreg');

    }

    // Jika email tidak ditemukan di kedua tabel
    return redirect()->back()->with('error', 'Alamat email yang Anda masukkan tidak sama dengan alamat email manapun');
}


public function logoutsp()
{
    // Hapus cookie 'sp_id'
    Cookie::queue(Cookie::forget('sp_id'));

    // Redirect kembali ke halaman login
    return redirect()->route('loginnn')->with('success', 'Berhasil Keluar');
}

public function logoutad()
{
    // Hapus cookie 'sp_id'
    Cookie::queue(Cookie::forget('tutor_id'));

    // Redirect kembali ke halaman login
    return redirect()->route('loginnn')->with('success', 'Berhasil Keluar');
}

public function logoutsiswa()
{
    // Hapus cookie 'sp_id'
    Cookie::queue(Cookie::forget('user_id'));

    // Redirect kembali ke halaman login
    return redirect()->route('loginnn')->with('success', 'Berhasil Keluar');
}

}

