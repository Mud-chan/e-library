<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfilespController;
use App\Http\Controllers\ContentspController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('index');
});
Route::get('/detail', function () {
    return view('detail');
});
Route::get('/bacabuku', function () {
    return view('bacabuku');
});

Route::get('/logreg', [RegisterController::class, 'index'])->name('logreg');
Route::post('/logreg', [RegisterController::class, 'store']);
Route::resource('user', RegisterController::class);
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('updatePassword');

Route::get('/logreg', [LoginController::class, 'index'])->name('loginnn');
Route::post('/logreg', [LoginController::class, 'login']);
Route::get('/logoutsp', [LoginController::class, 'logoutsp'])->name('logoutsp');
Route::get('/logoutsiswa', [LoginController::class, 'logoutsiswa'])->name('logoutsiswa');

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PagesControllerSp;

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendmail');
Route::get('/updatepass', [EmailController::class, 'uppas'])->name('updatepass');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/dashboardsp', 'PagesControllerSp@dashboard')->name('pages.dashboardsp');
    Route::get('/katalogbuku', 'PagesControllerSp@katalogbuku')->name('pages.katalogbuku');
    // Route::get('/profilesp', 'ProfilespController@profilesp')->name('pages.profilesp');
    // Route::post('/carisiswasp', 'PagesControllerSp@carisiswasp')->name('pages.carisiswasp');
    // Route::get('/datatransaksi', 'PagesControllerSp@datatransaksi')->name('pages.datatransaksi');
    // Route::get('/caritransaksi', 'PagesControllerSp@datatransaksi')->name('caritransaksi');
    // Route::get('/dashboardad', 'PagesControllerAdmin@dashboard')->name('pages.dashboardad');
    // Route::get('/kursus', 'PagesControllerAdmin@kursus')->name('pages.kursus');
    // Route::get('/landing', 'PagesController@landing')->name('pages.landing');
    // Route::get('/datawarga', 'PagesController@datawarga')->name('pages.datawarga');
    // Route::get('/info', 'PagesController@info')->name('pages.info');
    // Route::get('/bantuansosial', 'PagesController@bantuansosial')->name('pages.bantuansosial');
    // Route::get('/keuangan', 'PagesController@keuangan')->name('pages.keuangan');
    // Route::get('/berita/{slug}',
    // 'PagesController@luwe')->name('pages.berita');
});
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/profilesp', 'ProfilespController@profilesp')->name('pages.profilesp');

});

// Route::get('/profilesp', [ProfilespController::class, 'profilesp'])->name('tutors.profilesp');
Route::get('/tutors/editsp', [ProfilespController::class, 'editsp'])->name('tutors.editsp');
Route::put('/tutors/updatesp', [ProfilespController::class, 'updatesp'])->name('tutors.updatesp');

Route::get('/tutor', [TutorController::class, 'index'])->name('tutor.index');
Route::post('/caritutor', [TutorController::class, 'caritutor'])->name('tutor.caritutor');
Route::get('/add-guru', [TutorController::class, 'tambahtutor'])->name('add_guru');
Route::post('/upload-guru', [TutorController::class, 'storetutor'])->name('upload_guru');
Route::post('/delete-guru', [TutorController::class, 'deletetutor'])->name('delete_guru');


Route::get('/contentsp', [ContentspController::class, 'index'])->name('contentsp.index');
Route::post('/caricontentsp', [ContentspController::class, 'caricontentsp'])->name('caricontentsp');
Route::post('/delete-video', [ContentspController::class, 'delete'])->name('delete_video');
Route::post('/upload-content', [ContentspController::class, 'uploadContent'])->name('upload_content');
Route::get('/add-content', [ContentspController::class, 'showAddContentForm'])->name('add_content');
Route::get('/update-content/{videoId}', [ContentspController::class, 'updateContentForm'])->name('update.content.form');
Route::post('update-content/{videoId}', [ContentspController::class, 'updateContent'])->name('update.content');

Route::get('/detail-buku/{videoId}', [ContentspController::class, 'DetailBukuForm'])->name('detailbukusp.content');
Route::post('/video/{videoId}/store-comment', [ContentspController::class, 'storeComment'])->name('video.storeComment');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('/carisiswa', [SiswaController::class, 'carisiswa'])->name('siswa.carisiswa');
Route::get('/add-siswa', [SiswaController::class, 'showAddSiswaform'])->name('add_siswa');
Route::post('/upload-siswa', [SiswaController::class, 'uploadsiswa'])->name('upload_siswa');
Route::post('/delete-siswa', [SiswaController::class, 'delete'])->name('delete_siswa');
Route::get('/update-siswa/{siswaId}', [SiswaController::class, 'updateSiswaForm'])->name('update.siswa.form');
Route::post('update-siswa/{siswaId}', [SiswaController::class, 'updateSiswa'])->name('update.siswa');


Route::get('/detail-buku-siswa/{videoId}', [PagesControllerSp::class, 'DetailBukusiswa'])->name('detailbukusiswa.content');
Route::post('/video/{videoId}/store-comment-siswa', [PagesControllerSp::class, 'storeCommentsiswa'])->name('video.storeCommentsiswa');
Route::post('/buku/{id}/bookmark', [PagesControllerSp::class, 'toggleBookmark'])->name('buku.bookmark');
Route::match(['get', 'post'], '/caribuku', [PagesControllerSp::class, 'carikatalogbuku'])->name('caribuku');
Route::get('/bookmarkbuku', [PagesControllerSp::class, 'bookmarkview'])->name('bookmarkbuku');
Route::get('/historybuku', [PagesControllerSp::class, 'historyview'])->name('historybuku');
Route::post('/buku/{id}/rating', [PagesControllerSp::class, 'storeRating'])->name('buku.rating');
Route::post('/buku/update-comment/{id}', [PagesControllerSp::class, 'updateComment'])->name('buku.updateComment');
Route::delete('/buku/delete-comment/{id}', [PagesControllerSp::class, 'deleteComment'])->name('buku.deleteComment');

Route::get('/profilsiswa', function () {
    return view('profilsiswa');
});
