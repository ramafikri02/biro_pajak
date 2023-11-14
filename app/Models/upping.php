<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upping extends Model
{
    use HasFactory;
    protected $table = 'uppings';
    protected $primaryKey = 'id_upping';
    protected $guarded = [];
}
