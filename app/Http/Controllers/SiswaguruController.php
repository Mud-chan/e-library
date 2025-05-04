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

class SiswaguruController extends Controller
{
    public function index()
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('tutor_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;
        $contents = User::paginate(8);
        return view('viewsiswaguru', [
            "title" => "Data Siswa",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }

    public function carisiswaguru(Request $request)
    {
        // Ambil ID tutor dari cookie
        $tutor_id = Cookie::get('tutor_id');
        $tutors = Guru::find($tutor_id); // Temukan pengguna berdasarkan ID
        $guruName = $tutors->nama; // Ambil nama pengguna
        $guruImage = $tutors->image; // Ambil URL gambar profil pengguna
        $guruProfesi = $tutors->mengampu;

        // Ambil semua siswa
        $contents = User::query();

        // Lakukan pencarian jika terdapat input pencarian
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $contents->where('nama', 'like', '%' . $keyword . '%')->paginate(8);
        }

        // Ambil data siswa sesuai dengan kriteria pencarian
        $contents = $contents->paginate(8);

        return view('viewsiswaguru', [
            "title" => "Data Siswa",
            "guruName" => $guruName, // Teruskan nama pengguna ke tampilan
            "guruImage" => $guruImage,
            "guruProfesi" => $guruProfesi,
            "contents" => $contents,
            "totalPages" => $contents->lastPage(),
            "currentPage" => $contents->currentPage()
            // Teruskan URL gambar profil pengguna ke tampilan
        ]);
    }




}
