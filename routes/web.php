<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\GaleryController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::resource('menus', App\Http\Controllers\MenuController::class);
Route::resource('tokos', App\Http\Controllers\TokoController::class);
Route::resource('galerys', App\Http\Controllers\GaleryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
