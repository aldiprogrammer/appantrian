<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pasien extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */

    protected $table = 'pasien';
    protected $fillable = [
        'kode',
        'username',
        'password',
    ];
}
