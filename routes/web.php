<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [PagesController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
  Route::get('/register', [PagesController::class, 'register'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('registrasiPeserta.store');
  Route::get('/forgot-password', [PagesController::class, 'forgotPassword'])->name('forgotPassword');
  Route::get('/registrasi-peserta', [PagesController::class, 'registrasiPeserta'])->name('registrasiPeserta');
});