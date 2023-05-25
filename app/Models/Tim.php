<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tim extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_tim';
    public $incrementing = false;

    public function pertandingan(): HasMany
    {
        return $this->hasMany(JadwalPertandingan::class, 'id_pertandingan', 'id_pertandingan');
    }
}
