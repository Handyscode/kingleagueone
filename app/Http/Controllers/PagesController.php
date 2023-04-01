<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

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

    public function listPeserta(){
        $pesertas = DB::table('pesertas')->get();

        return view('list-peserta', ['pesertas' => $pesertas]);
    }

    public function editPeserta($id){
        $peserta = DB::table('pesertas')->where('id_peserta', $id)->first();
        return view('edit-peserta', ['peserta' => $peserta]);
    }

    public function registrasiTim(){
        return view('registrasi-tim');
    }

    public function generatedQR(){
        return view('generated-qr');
    }
}
