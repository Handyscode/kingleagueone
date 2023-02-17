<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
class PagesController extends Controller
{
    public function index(){
        $totalPeserta = count(Peserta::all());
        return view('index', ['totalPeserta' => $totalPeserta]);
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function forgotPassword(){
        return view('forgot-password');
    }

    public function registrasiPeserta(){
        return view('registrasi-peserta');
    }

    public function registrasiTim(){
        return view('registrasi-tim');
    }

    public function generatedQR(){
        return view('generated-qr');
    }
}
