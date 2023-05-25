<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
