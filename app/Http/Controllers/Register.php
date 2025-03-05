<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    function index()
    {
        return view('auth.register');
    }

    function actregister(Request $request)
    {

        $validate = $request->validate([
            'username' => 'required',
            'nowa' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'nowa.required' => 'Nomor whatsapp tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        if ($validate == false) {
            return redirect()->route('/register');
        }

        $pasien = new Pasien();
        $kode = 'PS-' . rand(0, 100000);
        $pasien->kode = $kode;
        $pasien->username = $request->username;
        $pasien->nowa = $request->nowa;
        $pasien->password = Hash::make($request->password);
        $pasien->save();
        return redirect()->route('/login')->with('sukses', 'Register berhasil dilakukan');
    }
}
