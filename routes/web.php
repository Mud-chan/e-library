<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfilespController;
use App\Http\Controllers\ProfileguruController;
use App\Http\Controllers\ContentspController;
use App\Http\Controllers\ContentguruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PagesControllerSp;
use App\Http\Controllers\SiswaguruController;
use App\Http\Controllers\PagesControllerGuru;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/detail', function () {
    return view('detail');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/bacabuku', function () {
    return view('bacabuku');
});
Route::get('/login', function () {
    return view('login');
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
Route::get('/logoutad', [LoginController::class, 'logoutad'])->name('logoutad');


Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendmail');
Route::get('/updatepass', [EmailController::class, 'uppas'])->name('updatepass');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/dashboardsp', 'PagesControllerSp@dashboard')->name('pages.dashboardsp');
    Route::get('/dashboardguru', 'PagesControllerGuru@dashboard')->name('pages.dashboardguru');
    Route::get('/katalogbuku', 'PagesControllerSp@katalogbuku')
        ->middleware('check.user.cookie')  // tambahkan ini
        ->name('pages.katalogbuku');
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
    Route::get('/profileguru', 'ProfileguruController@profileguru')->name('pages.profileguru');
    Route::get('/profilesiswa', 'ProfilespController@profilesiswa')->name('pages.profilesiswa');
});

// Route::get('/profilesp', [ProfilespController::class, 'profilesp'])->name('tutors.profilesp');
Route::get('/tutors/editsp', [ProfilespController::class, 'editsp'])->name('tutors.editsp');
Route::get('/tutors/editguru', [ProfileguruController::class, 'editguru'])->name('tutors.editguru');
Route::put('/tutors/updatesp', [ProfilespController::class, 'updatesp'])->name('tutors.updatesp');
Route::put('/tutors/updateguru', [ProfileguruController::class, 'updateguru'])->name('tutors.updateguru');
Route::get('/siswa/editsiswa', [PagesControllerSp::class, 'editsiswa'])->name('siswa.editsiswa');
Route::put('/siswa/updatesiswa', [PagesControllerSp::class, 'updatesiswa'])->name('siswa.updatesiswa');

Route::get('/tutor', [TutorController::class, 'index'])->name('tutor.index');
Route::post('/caritutor', [TutorController::class, 'caritutor'])->name('tutor.caritutor');
Route::get('/add-guru', [TutorController::class, 'tambahtutor'])->name('add_guru');
Route::post('/upload-guru', [TutorController::class, 'storetutor'])->name('upload_guru');
Route::post('/delete-guru', [TutorController::class, 'deletetutor'])->name('delete_guru');
Route::get('/update-guru/{guruId}', [TutorController::class, 'edittutor'])->name('update.guru.form');
Route::post('update-tutor/{guruId}', [TutorController::class, 'updatetutor'])->name('update.tutor');


Route::get('/', [PagesControllerSp::class, 'halamanutama'])->name('contentsp.halamanutama');
Route::get('/contentsp', [ContentspController::class, 'index'])->name('contentsp.index');
Route::get('/contentguru', [ContentguruController::class, 'index'])->name('contentguru.index');
Route::post('/caricontentsp', [ContentspController::class, 'caricontentsp'])->name('caricontentsp');
Route::post('/caricontentguru', [ContentguruController::class, 'caricontentguru'])->name('caricontentguru');
Route::post('/delete-video', [ContentspController::class, 'delete'])->name('delete_video');
Route::post('/delete-buku-guru', [ContentguruController::class, 'deletebukuguru'])->name('delete_buku_guru');
Route::post('/upload-content', [ContentspController::class, 'uploadContent'])->name('upload_content');
Route::post('/upload-content-guru', [ContentguruController::class, 'uploadContentGuru'])->name('upload_content_guru');
Route::get('/add-content', [ContentspController::class, 'showAddContentForm'])->name('add_content');
Route::get('/add-content-guru', [ContentguruController::class, 'showAddContentFormGuru'])->name('add_content_guru');
Route::get('/update-content/{videoId}', [ContentspController::class, 'updateContentForm'])->name('update.content.form');
Route::get('/update-content-guru/{videoId}', [ContentguruController::class, 'updateContentFormGuru'])->name('update.content.guru.form');
Route::post('update-content/{videoId}', [ContentspController::class, 'updateContent'])->name('update.content');
Route::post('update-content-guru/{videoId}', [ContentguruController::class, 'updateContentGuru'])->name('update.content.guru');

Route::get('/detail-buku/{videoId}', [ContentspController::class, 'DetailBukuForm'])->name('detailbukusp.content');
Route::get('/detail-buku-guru/{videoId}', [ContentguruController::class, 'DetailBukuFormGuru'])->name('detailbukuguru.content');
Route::post('/video/{videoId}/store-comment', [ContentspController::class, 'storeComment'])->name('video.storeComment');
Route::post('/video/{videoId}/store-comment-guru', [ContentguruController::class, 'storeCommentGuru'])->name('video.storeCommentGuru');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswaguru', [SiswaguruController::class, 'index'])->name('siswaguru.index');
Route::post('/carisiswa', [SiswaController::class, 'carisiswa'])->name('siswa.carisiswa');
Route::post('/carisiswaguru', [SiswaguruController::class, 'carisiswaguru'])->name('siswa.carisiswaguru');
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


Route::post('/buku/update-comment-guru/{id}', [ContentguruController::class, 'updateCommentGuru'])->name('buku.updateCommentguru');
Route::delete('/buku/delete-comment-guru/{id}', [ContentguruController::class, 'deleteCommentGuru'])->name('buku.deleteCommentguru');

// Route::get('/profilsiswa', function () {
//     return view('profilsiswa');
// });

Route::post('/kirim-email', [KontakController::class, 'kirimEmail'])->name('kirim.email');

Route::get('/recommend', [BookController::class, 'recommend'])->name('recommend');
Route::resource('books', BookController::class);
Route::get('/ajax-cari-buku', [PagesControllerSp::class, 'ajaxCariBuku'])->name('ajax.cari.buku');
