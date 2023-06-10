<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveScore extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_livescore';
    public $incrementing = false;

    public function pertandingan(): BelongsTo
    {
        return $this->belongsTo(Pertandingan::class, 'id_pertandingan', 'id_pertandingan');
    }
}
