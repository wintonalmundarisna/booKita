<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoleksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [DaftarController::class, 'index'])->middleware('guest');
;
Route::post('/register', [DaftarController::class, 'daftar']);

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::resource('/koleksi', KoleksiController::class)->middleware('auth');

Route::get('/koleksi/edit/{id}', [KoleksiController::class, 'edit'])->middleware('auth');

Route::get('/detail/{id}/show/', 'KoleksiController@show')->middleware('auth');

Route::get('/tambah-buku', [KoleksiController::class, 'create'])->middleware('auth');

Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/semua-buku', function () {
    return view('semua-buku');
});


Route::get('/baca', function () {
    return view('pageBaca');
});

