<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PribadiController;
use App\Http\Controllers\ProgdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('progdi',ProgdiController::class);
Route::resource('pribadi', PribadiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('home', HomeController::class);
Route::get('/search', [MahasiswaController::class, 'search'])->name('search');
Route::get('/mahasiswa/daftar/{id}','App\Http\Controllers\MahasiswaController@daftar');
