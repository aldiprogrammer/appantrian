<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $fillable = [
        'kode',
        'nama_dokoter',
        'nip',
        'spesialis',
        'foto'
    ];

    function poli()
    {
        return $this->hasMany(Poli::class, 'id_dokter');
    }
}
