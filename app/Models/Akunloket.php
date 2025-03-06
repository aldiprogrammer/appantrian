<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akunloket extends Model
{
    protected $table = 'akun_loket';
    protected $fillable = [
        'kode',
        'id_loket',
        'username',
        'password',
        'role'
    ];


    function loket()
    {
        return $this->belongsTo(Loket::class, 'id_loket');
    }
}
