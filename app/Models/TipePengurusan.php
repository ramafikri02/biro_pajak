<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePengurusan extends Model
{
    use HasFactory;

    protected $table = 'tipe_pengurusan';
    protected $primaryKey = 'id_tipe_pengurusan';
    protected $guarded = [];
}
