<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Images;
use Illuminate\Support\Facades\File;
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

    $now = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('Y-MM-D');
    $lastPesertaID = DB::table('pesertas')->select('id_peserta')->orderBy('id_peserta', 'desc')->first();
    // dd($lastPesertaID);
    if ($lastPesertaID == null) {
      $pesertaID = 'PST' . "001";
    } else {
      $lastIncrement = substr($lastPesertaID->id_peserta, -3);
      $pesertaID = 'PST' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
    }
    
    $photo = $request->file('photo');
    $foto_kk = $request->file('foto_kk');
    $foto_akte = $request->file('foto_akte');
    $foto_ijazah = $request->file('foto_ijazah');

    $photoPath = public_path('/photo');
    $fotoKKPath = public_path('/fotoKK');
    $fotoAktePath = public_path('/fotoAkte');
    $fotoIjazahPath = public_path('/fotoIjazah');

    $extensionPhoto = $photo->getClientOriginalExtension();
    $extensionFotoKK = $foto_kk->getClientOriginalExtension();
    $extensionFotoAkte = $foto_akte->getClientOriginalExtension();
    $extensionFotoIjazah = $foto_ijazah->getClientOriginalExtension();
    
    $photoName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $pesertaID . '-photo' . '.' . $extensionPhoto;
    $fotoKKName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $pesertaID . '-fotokk' . '.' . $extensionFotoKK;
    $fotoAkteName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $pesertaID .'-fotoakte' . '.' . $extensionFotoAkte;
    $fotoIjazahName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $pesertaID . '-fotoijazah' . '.' . $extensionFotoIjazah;

    $publishPhoto = Image::make($photo)->resize(750, 1200, function($constrain){
      $constrain->aspectRatio();
    })->save($photoPath.'/'.$photoName);

    $publishKK = Image::make($foto_kk)->resize(750, 1200, function($constrain){
      $constrain->aspectRatio();
    })->save($fotoKKPath.'/'.$fotoKKName);

    $publishAkte = Image::make($foto_akte)->resize(750, 1200, function($constrain){
      $constrain->aspectRatio();
    })->save($fotoAktePath.'/'.$fotoAkteName);

    $publishIjazah = Image::make($foto_ijazah)->resize(750, 1200, function($constrain){
      $constrain->aspectRatio();
    })->save($fotoIjazahPath.'/'.$fotoIjazahName);

    Peserta::create([
      'id_peserta' => $pesertaID,
      'photo' => $photoName,
      'nama' => $request->get('nama_peserta'),
      'id_tim' => $request->get('asal_tim'),
      'kategori_usia' => $request->get('kategori_usia'),
      'no_punggung' => $request->get('no_punggung'),
      'id_posisi' => $request->get('posisi'),
      'foto_kk' => $fotoKKName,
      'foto_akte' => $fotoAkteName,
      'foto_ijazah' => $fotoIjazahName,
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
      $photoPath = public_path('/photo');
      $extensionPhoto = $photo->getClientOriginalExtension();
      $photoName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $id . '-photo' . '.' . $extensionPhoto;

      File::delete(public_path('photo/'.$gambarOld->photo));

      $publishPhoto = Image::make($photo)->resize(750, 1200, function($constrain){
        $constrain->aspectRatio();
      })->save($photoPath.'/'.$photoName);
    }
    if($foto_kk){
      $fotoKKPath = public_path('/fotoKK');
      $extensionFotoKK = $foto_kk->getClientOriginalExtension();
      $fotoKKName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $id . '-fotokk' . '.' . $extensionFotoKK;

      File::delete(public_path('fotoKK/'.$gambarOld->foto_kk));

      $publishKK = Image::make($foto_kk)->resize(750, 1200, function($constrain){
        $constrain->aspectRatio();
      })->save($fotoKKPath.'/'.$fotoKKName);
    }
    if($foto_akte){
      $fotoAktePath = public_path('/fotoAkte');
      $extensionFotoAkte = $foto_akte->getClientOriginalExtension();
      $fotoAkteName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $id .'-fotoakte' . '.' . $extensionFotoAkte;

      File::delete(public_path('fotoAkte/'.$gambarOld->foto_akte));

      $publishAkte = Image::make($foto_akte)->resize(750, 1200, function($constrain){
        $constrain->aspectRatio();
      })->save($fotoAktePath.'/'.$fotoAkteName);
    }
    if($foto_ijazah){
      $fotoIjazahPath = public_path('/fotoIjazah');
      $extensionFotoIjazah = $foto_ijazah->getClientOriginalExtension();
      $fotoIjazahName = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('YMMD') . $id . '-fotoijazah' . '.' . $extensionFotoIjazah;

      File::delete(public_path('fotoIjazah/'.$gambarOld->foto_ijazah));

      $publishIjazah = Image::make($foto_ijazah)->resize(750, 1200, function($constrain){
        $constrain->aspectRatio();
      })->save($fotoIjazahPath.'/'.$fotoIjazahName);
    }

    try {
      Peserta::where('id_peserta', $id)->update([
        'photo' => $photo ? $photoName : $gambarOld->photo,
        'nama' => $request->get('nama_peserta'),
        'id_tim' => $request->get('asal_tim'),
        'kategori_usia' => $request->get('kategori_usia'),
        'no_punggung' => $request->get('no_punggung'),
        'id_posisi' => $request->get('posisi'),
        'foto_kk' => $foto_kk ? $fotoKKName : $gambarOld->foto_kk,
        'foto_akte' => $foto_akte ? $fotoAkteName : $gambarOld->foto_akte,
        'foto_ijazah' => $foto_ijazah ? $fotoIjazahName : $gambarOld->foto_ijazah,
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
    File::delete(public_path('photo/'.$gambarOld->photo));
    File::delete(public_path('fotoKK/'.$gambarOld->foto_kk));
    File::delete(public_path('fotoAkte/'.$gambarOld->foto_akte));
    File::delete(public_path('fotoIjazah/'.$gambarOld->foto_ijazah));

    Peserta::where('id_peserta', $id)->delete();

    return redirect()->route('listPeserta')->with('Success', 'Berhasil Menghapus Data');
  }
}
