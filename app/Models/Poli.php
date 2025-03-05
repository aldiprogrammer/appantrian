<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';

    protected $fillable = [
        'kode',
        'poli',
    ];

    function loket()
    {
        return $this->hasMany(Loket::class, 'id_poli');
    }
}
