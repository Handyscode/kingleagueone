<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Images;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
  public function store(Request $request){
    $validated = $request->validate([
      'photo' => 'required|image',
      'nama_peserta' => 'required',
      'asal_tim' => 'required',
      'kategori_usia' => 'required',
      'no_punggung' => 'required',
      'posisi' => 'required',
      'foto_kk' => 'required|image',
      'foto_akte' => 'required|image',
      'foto_ijazah' => 'required|image',
    ]);

    $photo = Storage::disk('public')->put('foto-peserta', $request->file('photo'));
    $foto_kk = Storage::disk('public')->put('foto-kk', $request->file('foto_kk'));
    $foto_akte = Storage::disk('public')->put('foto-akte', $request->file('foto_akte'));
    $foto_ijazah = Storage::disk('public')->put('foto-ijazah', $request->file('foto_ijazah'));

    $now = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('Y-MM-D');
    $lastPesertaID = DB::table('pesertas')->select('id_peserta')->where('tgl_daftar', $now)->orderBy('id_peserta', 'desc')->first();
    // dd($lastPesertaID);
    if ($lastPesertaID == null) {
      $pesertaID = 'PST' . "001";
    } else {
      $lastIncrement = substr($lastPesertaID->id_peserta, -3);
      $pesertaID = 'PST' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
    }

    Peserta::create([
      'id_peserta' => $pesertaID,
      'photo' => $photo,
      'nama' => $request->get('nama_peserta'),
      'asal_tim' => $request->get('asal_tim'),
      'kategori_usia' => $request->get('kategori_usia'),
      'no_punggung' => $request->get('no_punggung'),
      'posisi' => $request->get('posisi'),
      'foto_kk' => $foto_kk,
      'foto_akte' => $foto_akte,
      'foto_ijazah' => $foto_ijazah,
      'tgl_daftar' => $now,
    ]);

    return redirect('/registrasi-peserta/generated-qr')->with('pesertaID', $pesertaID);
  }

  public function update(Request $request, $id){
    $rules = [
      'nama_peserta' => 'required',
      'asal_tim' => 'required',
      'kategori_usia' => 'required',
      'no_punggung' => 'required',
      'posisi' => 'required',
    ];

    $gambarOld = Peserta::where('id_peserta', $id)->select('photo', 'foto_kk', 'foto_akte', 'foto_ijazah')->first();

    $photo = $request->file('photo');
    $foto_kk = $request->file('foto_kk');
    $foto_akte = $request->file('foto_akte');
    $foto_ijazah = $request->file('foto_ijazah');

    if ($photo) {
      $rules['photo'] = 'required|image';
    }
    if ($foto_kk) {
      $rules['foto_kk'] = 'required|image';
    }
    if ($foto_akte) {
      $rules['foto_akte'] = 'required|image';
    }
    if ($foto_ijazah) {
      $rules['foto_ijazah'] = 'required|image';
    }
    
    $validated = $request->validate($rules);
    
    if ($photo) {
      Storage::disk('public')->delete(public_path('storage/'.$gambarOld->photo));
      $photo = Storage::disk('public')->put('foto-peserta', $request->file('photo'));
    }
    if($foto_kk){
      Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_kk));
      $foto_kk = Storage::disk('public')->put('foto-kk', $request->file('foto_kk'));
    }
    if($foto_akte){
      Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_akte));
      $foto_akte = Storage::disk('public')->put('foto-akte', $request->file('foto_akte'));
    }
    if($foto_ijazah){
      Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_ijazah));
      $foto_ijazah = Storage::disk('public')->put('foto-ijazah', $request->file('foto_ijazah'));
    }

    try {
      Peserta::where('id_peserta', $id)->update([
        'photo' => $photo ? $photo : $gambarOld->photo,
        'nama' => $request->get('nama_peserta'),
        'asal_tim' => $request->get('asal_tim'),
        'kategori_usia' => $request->get('kategori_usia'),
        'no_punggung' => $request->get('no_punggung'),
        'posisi' => $request->get('posisi'),
        'foto_kk' => $foto_kk ? $foto_kk : $gambarOld->foto_kk,
        'foto_akte' => $foto_akte ? $foto_akte : $gambarOld->foto_akte,
        'foto_ijazah' => $foto_ijazah ? $foto_ijazah : $gambarOld->foto_ijazah,
      ]);
    } catch (\Exception $e) {
      return back()->with('Error', $e->getMessage());
    }

    return redirect()->route('listPeserta')->with('Success', 'Berhasil Mengedit Data');
  }

  public function pesertaProfile($id){
    $peserta = Peserta::where('id_peserta', $id)->first();
    return view('peserta-profile', ['peserta' => $peserta]);
  }

  public function delete(Request $request, $id){
    $gambarOld = Peserta::where('id_peserta', $id)->select('photo', 'foto_kk', 'foto_akte', 'foto_ijazah')->first();
    Storage::disk('public')->delete(public_path('storage/'.$gambarOld->photo));
    Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_kk));
    Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_akte));
    Storage::disk('public')->delete(public_path('storage/'.$gambarOld->foto_ijazah));

    Peserta::where('id_peserta', $id)->delete();

    return redirect()->route('listPeserta')->with('Success', 'Berhasil Menghapus Data');
  }
}
