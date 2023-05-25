<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_peserta';
    public $incrementing = false;

    public function pertandingan(): HasMany
    {
        return $this->hasMany(JadwalPertandingan::class, 'id_tim', 'id_tim');
    }

    public function tim(): HasOne
    {
        return $this->hasOne(Tim::class, 'id_tim', 'id_tim');
    }

    public function posisi(): HasOne
    {
        return $this->hasOne(Posisi::class, 'id_posisi', 'id_posisi');
    }
}
