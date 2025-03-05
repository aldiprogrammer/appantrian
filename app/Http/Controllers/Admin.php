<?php

namespace App\Http\Controllers;

use App\Models\Akunloket;
use App\Models\Antrian;
use App\Models\Loket;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class Admin extends Controller
{
    function index()
    {
        return view('admin.index');
    }

    function poli()
    {
        $poli = Poli::all();
        $kode = 'PL-' . rand(0, 100000);
        return view('admin.poli', compact('poli', 'kode'));
    }

    function addpoli(Request $request)
    {

        $kode = $request->kode;
        $poli = $request->poli;
        $pl = new Poli();
        $pl->kode = $kode;
        $pl->poli = $poli;
        $pl->save();
        return redirect()->route('admin/poli')->with('sukses', 'Data berhasil disimpan');
    }

    function editpoli(Request $request)
    {
        $id = $request->id;
        $poli = Poli::find($id);
        $poli->poli = $request->poli;
        $poli->save();
        return redirect()->route('admin/poli')->with('sukses', 'Data berhasil diubah');
    }

    function hapuspoli($id)
    {
        $poli = Poli::find($id);
        $poli->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    function loket()
    {
        $poli = Poli::all();
        $loket = Loket::with('poli')->get();
        $kode = "LK-" . rand(0, 10000);
        return view('admin.loket', compact('poli', 'loket', 'kode'));
    }

    function addloket(Request $request)
    {

        $validate = $request->validate([
            'poli' => 'required|unique:loket,id_poli|max:255',
        ], [
            'poli.unique' => 'Poli sudah terdaftar di loket lain',
        ]);

        if ($validate == false) {
            return redirect()->route('admin/loket');
        }

        $loket = new Loket();
        $loket->kode = $request->kode;
        $loket->loket = $request->loket;
        $loket->id_poli = $request->poli;

        $loket->save();
        return redirect()->route('admin/loket')->with('sukses', 'Data berhil ditambah');
    }

    function editloket(Request $request)
    {

        if ($request->poliold != $request->poli) {
            $validate = $request->validate([
                'poli' => 'required|unique:loket,id_poli|max:225',
            ], [
                'poli.unique' => 'Poli yang anda pilih sudah terdaftar di loket lain',
            ]);

            if ($validate == false) {
                return redirect()->route('admin/loket');
            }
        }

        $id = $request->id;
        $loket = Loket::find($id);
        $loket->loket = $request->loket;
        $loket->id_poli = $request->poli;
        $loket->save();
        return redirect()->route('admin/loket')->with('sukses', 'Data berhasil diubah');
    }

    function hapusloket($id)
    {
        $loket = Loket::find($id);
        $loket->delete();
        return response()->json(['success', 'data berhasil dihapus']);
    }

    function antrian()
    {
        $antrian = Antrian::all();
        return view('admin.antrian', compact('antrian'));
    }


    function akunloket()
    {
        $akun = Akunloket::with('loket')->get();
        $loket = Loket::all();
        return view('admin.akunloket', compact('akun', 'loket'));
    }

    function addakunloket(Request $request)
    {

        $akun = new Akunloket();
        $akun->kode = 'AL-' . rand(0, 10000);
        $akun->username = $request->username;
        $akun->id_loket = $request->loket;
        $akun->password = Hash::make($request->password);
        $akun->save();
        return redirect()->route('admin/akunloket')->with('sukses', 'Data berhasil disimpan');
    }

    function editakunloket(Request $request)
    {
        $akun = Akunloket::find($request->id);
        $akun->id_loket = $request->loket;
        $akun->username = $request->username;
        $akun->save();
        return redirect()->route('admin/akunloket')->with('sukses', 'Data berhasil diubah');
    }

    function hapusakunloket($id)
    {
        $akun = Akunloket::find($id);
        $akun->delete();

        return response()->json(['success', 'data berhasil dihapus']);
    }

    function dokter()
    {
        return view('admin.dokter');
    }
}
