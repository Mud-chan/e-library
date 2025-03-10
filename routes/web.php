<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

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


use App\Http\Controllers\EmailController;
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendmail');
Route::get('/updatepass', [EmailController::class, 'uppas'])->name('updatepass');
