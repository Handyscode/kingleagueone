<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Posisi;
use App\Models\JadwalPertandingan;
use App\Models\Tim;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        $totalPeserta = count(Peserta::all());
        $totalTim = count(Tim::all());
        return view('index', ['totalPeserta' => $totalPeserta, 'totalTim' => $totalTim]);
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
        $posisis = Posisi::all();
        $tims = Tim::all();
        return view('registrasi-peserta', ['tims' => $tims, 'posisis' => $posisis]);
    }

    public function listPeserta(){
        $pesertas = Peserta::all();
        return view('list-peserta', ['pesertas' => $pesertas]);
    }

    public function editPeserta($id){
        $peserta = DB::table('pesertas')->where('id_peserta', $id)->first();
        $posisis = Posisi::all();
        $tims = Tim::all();
        return view('edit-peserta', ['peserta' => $peserta, 'posisis' => $posisis, 'tims' => $tims]);
    }
    
    public function registrasiTim(){
        return view('registrasi-tim');
    }

    public function editTim($id){
        $tim = DB::table('tims')->where('id_tim', $id)->first();
        return view('edit-tim', ['tim' => $tim]);
    }

    public function listTim(){
        $tims = DB::table('tims')->get();
        return view('list-tim', ['tims' => $tims]);
    }

    public function generatedQR(){
        return view('generated-qr');
    }

    public function jadwalPertandingan(){
        $jadwalPertandingan = JadwalPertandingan::all();
        return view('jadwal-pertandingan', ['jadwalPertandingan' => $jadwalPertandingan]);
    }
    public function tambahPertandingan(){
        $tims = DB::table('tims')->get();
        return view('tambah-pertandingan', ['tims' => $tims]);
    }

    public function scanQR(){
        return view('scan-qr');
    }
}
