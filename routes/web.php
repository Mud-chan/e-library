<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfilespController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logreg', [RegisterController::class, 'index'])->name('logreg');
Route::post('/logreg', [RegisterController::class, 'store']);
Route::resource('user', RegisterController::class);
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('updatePassword');

Route::get('/logreg', [LoginController::class, 'index'])->name('loginnn');
Route::post('/logreg', [LoginController::class, 'login']);
Route::get('/logoutsp', [LoginController::class, 'logoutsp'])->name('logoutsp');


use App\Http\Controllers\EmailController;
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendmail');
Route::get('/updatepass', [EmailController::class, 'uppas'])->name('updatepass');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/dashboardsp', 'PagesControllerSp@dashboard')->name('pages.dashboardsp');
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
