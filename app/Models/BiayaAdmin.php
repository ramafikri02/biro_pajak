<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaAdmin extends Model
{
    use HasFactory;

    protected $table = 'biaya_admin';
    protected $primaryKey = 'id_biaya_admin';
    protected $guarded = [];
}
