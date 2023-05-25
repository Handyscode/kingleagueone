<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\JadwalPertandinganController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
  Route::get('/', [PagesController::class, 'index'])->name('index');
  Route::get('/registrasi-peserta', [PagesController::class, 'registrasiPeserta'])->name('registrasiPeserta');
  Route::get('/list-peserta', [PagesController::class, 'listPeserta'])->name('listPeserta');
  Route::get('/list-peserta/edit-peserta/{id}', [PagesController::class, 'editPeserta'])->name('listPeserta.editPeserta')->middleware('user-access:admin');
  Route::get('/peserta-profile/{id}', [PesertaController::class, 'pesertaProfile'])->name('pesertaProfile');
  Route::post('/list-peserta/delete-peserta/{id}', [PesertaController::class, 'delete'])->name('listPeserta.deletePeserta')->middleware('user-access:admin');
  Route::post('/list-peserta/edit-peserta/{id}', [PesertaController::class, 'update'])->name('listPeserta.updatePeserta')->middleware('user-access:admin');
  Route::post('/registrasi-peserta', [PesertaController::class, 'store'])->name('store');
  Route::get('/registrasi-peserta/generated-qr', [PagesController::class, 'generatedQR'])->name('registrasiPeserta.generatedQR');
  Route::post('/list-tim/delete-tim/{id}', [TimController::class, 'delete'])->name('listTim.deleteTim')->middleware('user-access:admin');
  Route::get('/list-tim/edit-tim/{id}', [PagesController::class, 'editTim'])->name('listTim.editTim');
  Route::post('/list-tim/edit-tim/{id}', [TimController::class, 'update'])->name('listTim.updateTim');
  Route::get('/list-tim', [PagesController::class, 'listTim'])->name('listTim');
  Route::get('/registrasi-tim', [PagesController::class, 'registrasiTim'])->name('registrasiTim');
  Route::post('/registrasi-tim', [TimController::class, 'store'])->name('registrasiTim.store');
  Route::get('/jadwal-pertandingan', [PagesController::class, 'jadwalPertandingan'])->name('jadwalPertandingan');
  Route::get('/jadwal-pertandingan/tambah-pertandingan', [PagesController::class, 'tambahPertandingan'])->name('jadwalPertandingan.tambah-pertandingan');
  Route::post('/jadwal-pertandingan/tambah-pertandingan', [JadwalPertandinganController::class, 'store'])->name('jadwalPertandingan.store-pertandingan');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [PagesController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
  Route::get('/register', [PagesController::class, 'register'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('registrasiPeserta.store');
  Route::get('/forgot-password', [PagesController::class, 'forgotPassword'])->name('forgotPassword');
});
