<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';

    protected $fillable = [
        'kode',
        'poli',
        'id_dokter',
    ];

    function loket()
    {
        return $this->hasMany(Loket::class, 'id_poli');
    }

    function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
