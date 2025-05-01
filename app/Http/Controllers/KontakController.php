<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class KontakController extends Controller{
    public function kirimEmail(Request $request)
{
    $data = [
        'nama' => $request->nama,
        'email' => $request->email,
        'pesan' => $request->pesan,
    ];

    Mail::raw("Nama: {$request->nama}\nEmail: {$request->email}\nPesan:\n{$request->pesan}", function ($message) {
        $message->to('lewdchan55@gmail.com', 'Admin')
                ->subject('Pesan dari Form Kontak');
    });



    return back()->with('success', 'Pesan berhasil dikirim!');
}

}




?>
