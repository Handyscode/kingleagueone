<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim;
use App\Images;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TimController extends Controller
{
  public function store(Request $request){
      $validated = $request->validate([
          'logoTim' => 'required|image',
          'nama_tim' => 'required',
          'nama_pelatih' => 'required',
          'kategori_usia' => 'required'
        ]);

      $logoTim = Storage::disk('public')->put('logo-tim', $request->file('logoTim'));

      $now = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('Y-MM-D');
      $lastTimID = DB::table('tims')->select('id_tim')->orderBy('id_tim', 'desc')->first();
      // dd($lastTimID);
      if ($lastTimID == null) {
          $timID = 'TIM' . "001";
      } else {
          $lastIncrement = substr($lastTimID->id_tim, -3);
          $timID = 'TIM' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
      }

      Tim::create([
          'id_tim' => $timID,
          'nama_tim' => $request->nama_tim,
          'nama_pelatih' => $request->nama_pelatih,
          'logo_tim' => $logoTim,
          'kategori_usia' => $request->kategori_usia,
          'jumlah_pertandingan' => 0,
          'jumlah_poin' => 0,
      ]);

      return redirect()->route('listTim')->with('Success', 'Berhasil Menambahkan Tim');
  }

  public function update(Request $request, $id){
      $rules = [
          'nama_tim' => 'required',
          'nama_pelatih' => 'required',
          'kategori_usia' => 'required'
      ];
  
      $gambarOld = Tim::where('id_tim', $id)->select('logo_tim')->first();
      
      $logoTim = $request->file('logoTim');
      
      if ($logoTim) {
          $rules['logoTim'] = 'required|image';
      }
      
      $validated = $request->validate($rules);
      
      if ($logoTim) {
        Storage::disk('public')->delete(public_path('storage/'.$gambarOld->logo_tim));
        $logoTim = Storage::disk('public')->put('logo-tim', $request->file('logoTim'));
      }
  
      try {
        Tim::where('id_tim', $id)->update([
          'logo_tim' => $logoTim ? $logoTim : $gambarOld->logo_tim,
          'nama_tim' => $request->get('nama_tim'),
          'nama_pelatih' => $request->get('nama_pelatih'),
          'kategori_usia' => $request->get('kategori_usia'),
        ]);
      } catch (\Exception $e) {
        return back()->with('Error', $e->getMessage());
      }
  
      return redirect()->route('listTim')->with('Success', 'Berhasil Mengedit Data');
    }

    public function delete(Request $request, $id){
      $gambarOld = Tim::where('id_tim', $id)->select('logo_tim')->first();
      Storage::disk('public')->delete(public_path('storage/'.$gambarOld->logo_tim));
  
      Tim::where('id_tim', $id)->delete();
  
      return redirect()->route('listTim')->with('Success', 'Berhasil Menghapus Data');
    }
}

