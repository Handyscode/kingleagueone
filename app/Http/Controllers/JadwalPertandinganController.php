<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPertandingan;
use App\Models\LiveScore;
use App\Images;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JadwalPertandinganController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'tim_home' => 'required',
            'tim_away' => 'required',
            'tgl_pertandingan' => 'required'
        ]);
            
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('Y-MM-D');
        $lastPertandinganID = DB::table('jadwal_pertandingans')->select('id_pertandingan')->orderBy('id_pertandingan', 'desc')->first();
        if ($lastPertandinganID == null) {
            $pertandinganID = 'PTD' . "001";
        } else {
            $lastIncrement = substr($lastPertandinganID->id_pertandingan, -3);
            $pertandinganID = 'PTD' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }

        $lastLivescoreID = DB::table('live_scores')->select('id_livescore')->orderBy('id_livescore', 'desc')->first();
        if ($lastLivescoreID == null) {
            $livescoreID = 'LVS' . "001";
        } else {
            $lastIncrement = substr($lastLivescoreID->id_livescore, -3);
            $livescoreID = 'LVS' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }
  
        JadwalPertandingan::create([
            'id_pertandingan' => $pertandinganID,
            'id_tim_home' => $request->tim_home,
            'id_tim_away' => $request->tim_away,
            'tgl_pertandingan' => $request->tgl_pertandingan,
        ]);

        LiveScore::create([
            'id_livescore' => $livescoreID,
            'id_pertandingan' => $pertandinganID,
            'score_home' => 0,
            'score_away' => 0
        ]);

        return redirect()->route('jadwalPertandingan')->with('Success', 'Berhasil Membuat Jadwal Pertandingan');
    }
}
