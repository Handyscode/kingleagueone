<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JadwalPertandingan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_pertandingan';
    public $incrementing = false;

    public function timHome(): HasMany
    {
        return $this->hasMany(Tim::class, 'id_tim', 'id_tim_home');
    }

    public function timAway(): HasMany
    {
        return $this->hasMany(Tim::class, 'id_tim', 'id_tim_away');
    }
    
    public function livescore(): HasOne
    {
        return $this->hasOne(LiveScore::class, 'id_pertandingan', 'id_pertandingan');
    }
}
