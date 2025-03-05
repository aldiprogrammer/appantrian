<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';
    protected $fillable = [
        'id_poli',
        'poli',
        'kode_antrian',
        'tgl_antrian'
    ];
}
