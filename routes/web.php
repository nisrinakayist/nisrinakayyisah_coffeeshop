<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LikeController;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('menus/filter', [App\Http\Controllers\LikeController::class, 'index'])->name('menus.filter');
Route::post('menus/like/{id}', [App\Http\Controllers\LikeController::class, 'toggleLike'])->name('menus.like');
Route::resource('menus', App\Http\Controllers\MenuController::class);
Route::resource('tokos', App\Http\Controllers\TokoController::class);
Route::resource('galerys', App\Http\Controllers\GaleryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
