<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
    use HasFactory;

    protected $table = 'estimasi';
    protected $primaryKey = 'id_estimasi';
    protected $guarded = [];
    protected $fillable = [
        'id_kendaraan',
        'id_tipe_pengurusan',
        'id_wilayah',
        'id_pelanggan',
    ];
}
