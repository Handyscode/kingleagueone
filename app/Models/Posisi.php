<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_posisi';
    public $incrementing = false;
}
