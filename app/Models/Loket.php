<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    protected $table = 'loket';
    protected $fillabel = [
        'kode',
        'loket',
        'id_poli',
    ];

    function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    function akunloket()
    {
        return $this->hasMany(Akunloket::class, 'id_loket');
    }
}
