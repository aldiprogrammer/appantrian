<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Loket;
use App\Models\Poli;
use BcMath\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class App extends Controller
{
    function index()
    {
        $poli = Poli::all();
        return view('app.index', compact('poli'));
    }

    function add_antrian(Request $request)
    {

        $date = date('Y-m-d');
        $id = $request->id;

        $cek = Antrian::where('tgl_antrian', $date)->where('id_poli', $id)->orderBy('id', 'desc')->first();
        $nextNumber = $cek ? intval($cek->kode_antrian) + 1 : 1;
        $kode = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $poli = Poli::find($id);
        $loket = Loket::where('id_poli', $id)->first();

        $antrian = new Antrian();
        $antrian->id_poli = $id;
        $antrian->poli = $poli->poli;
        $antrian->id_loket = $loket->id;
        $antrian->kode_antrian = $kode;
        $antrian->tgl_antrian = $date;
        $antrian->status = 0;
        $antrian->save();
    }
}
