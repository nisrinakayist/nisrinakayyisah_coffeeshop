<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\GaleryController;

// Route::controller(ForgotPasswordController::class)->group(function () {
//     Route::get('forgot-password', 'showForm')->name('forgot-password');
//     Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
// });
// Route::controller(ResetPasswordController::class)->group(function () {
//     Route::get('reset-password/{token}', 'getPassword')->name('password.reset');
//     Route::post('reset-password', 'updatePassword')->name('password.update');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::resource('menus', App\Http\Controllers\MenuController::class);
Route::resource('tokos', App\Http\Controllers\TokoController::class);
Route::resource('galerys', App\Http\Controllers\GaleryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
