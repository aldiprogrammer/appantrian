<?php

namespace App\Http\Controllers;

use App\Models\Pasien;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Login extends Controller
{

    function index()
    {
        return view('auth/login');
    }

    function actlogin(Request $request)
    {

        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        if ($validate == false) {
            return redirect()->back('/login');
        }
        $pasien = Pasien::where('username', $request->username)->first();
        if ($pasien && Hash::check($request->password, $pasien->password)) {

            $loglogin = [
                'username' => $request->username,
                'password' => $request->password,
            ];
            session($loglogin);
            return redirect()->route('/masuk');
        } else {

            return redirect()->Route('/login')->with('field', 'Username atau password salah');
        }
    }
}
