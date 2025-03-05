<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class App extends Controller
{
    function index()
    {
        $poli = Poli::all();
        return view('app.index', ['poli' => $poli]);
    }

    function add_antrian(Request $request)
    {
        $id = $request->id;
        $poli = Poli::find($id);
        $kode = 'AT-' . rand(0, 100000);

        $data = [
            'id_poli' => $id,
            'poli' => $poli->poli,
            'kode_antrian' => $kode,
            'tgl_antrian' => date('Y-m-d'),

        ];
        $add =  DB::table('antrian')->insert($data);
    }
}
