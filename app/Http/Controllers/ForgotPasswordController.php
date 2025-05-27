<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash; // Import class Hash
use Illuminate\Support\Facades\Cookie;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('verifemail');
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
        return redirect()->intended(route('logreg'))->with('success', 'Password updated successfully. Please login with your new password.');

    }

    // Jika email tidak ditemukan di tabel User, cek di tabel Tutors
    $tutor = Guru::where('email', $request->email)->first();

    if ($tutor) {
        // Update password tutor
        $tutor->password = Hash::make($request->password);
        $tutor->save();
        // Redirect ke halaman login setelah berhasil mengupdate password
        return redirect()->intended(route('logreg'))->with('success', 'Password berhasil diperbarui! Silahkan log in menggunakan password baru.');

    }

    // Jika email tidak ditemukan di kedua tabel
    return redirect()->back()->with('error', 'Alamat Email tidak sama dengan data manapun.');
}
}

