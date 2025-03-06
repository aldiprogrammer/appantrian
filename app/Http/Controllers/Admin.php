<?php

namespace App\Http\Controllers;

use App\Models\Akunloket;
use App\Models\Antrian;
use App\Models\Dokter;
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
        $poli = Poli::with('dokter')->get();
        $kode = 'PL-' . rand(0, 100000);
        $dokter = Dokter::all();
        return view('admin.poli', compact('poli', 'kode', 'dokter'));
    }

    function addpoli(Request $request)
    {

        $kode = $request->kode;
        $poli = $request->poli;
        $pl = new Poli();
        $pl->kode = $kode;
        $pl->poli = $poli;
        $pl->id_dokter = $request->dokter;
        $pl->save();
        return redirect()->route('admin/poli')->with('sukses', 'Data berhasil disimpan');
    }

    function editpoli(Request $request)
    {
        $id = $request->id;
        $poli = Poli::find($id);
        $poli->poli = $request->poli;
        $poli->id_dokter = $request->dokter;
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
        if (session('id_loket') !== null) {
            $antrian = Antrian::where('id_loket', session('id_loket'))->get();
        } else {
            $antrian = Antrian::all();
        }

        $cekantrian = Antrian::where('tgl_antrian', date('Y-m-d'))->where('status', '1')->orderBy('id', 'desc')->first();
        return view('admin.antrian', compact('antrian', 'cekantrian'));
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
        $akun->role = $request->role;
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
        $dokter = Dokter::all();
        return view('admin.dokter', compact('dokter'));
    }

    function adddokter(Request $request)
    {

        $validate = $request->validate(
            [
                'nama' => 'required',
                'nip' => 'required',
                'spesialis' => 'required',
                'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nip.required' => 'Nip tidak boleh kosong',
                'spesialis.required' => 'Spesialis tidak boleh kosong',
                'foto.required' => 'Foto tidak boleh kosong',
                'foto.mimes' => 'Format gambar tidak sesuai',
            ]
        );

        if ($validate == false) {
            return redirect()->route('admin/dokter');
        }
        $path = $request->file('foto')->store('uploads', 'public');
        $dokter = new Dokter();
        $dokter->kode = 'DR-' . rand(0, 10000);
        $dokter->nama_dokter = $request->nama;
        $dokter->nip = $request->nip;
        $dokter->spesialis = $request->spesialis;
        $dokter->foto = $path;

        $dokter->save();
        return redirect()->route('admin/dokter')->with('sukses', 'Data berhasil disimpan');
    }

    function editdokter(Request $request)
    {

        $validate = $request->validate(
            [
                'nama' => 'required',
                'nip' => 'required',
                'spesialis' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nip.required' => 'Nip tidak boleh kosong',
                'spesialis.required' => 'Spesialis tidak boleh kosong',
                'foto.required' => 'Foto tidak boleh kosong',
                'foto.mimes' => 'Format gambar tidak sesuai',
            ]
        );

        if ($validate == false) {
            return redirect()->route('admin/dokter');
        }
        $dokter = Dokter::find($request->id);
        $dokter->nama_dokter = $request->nama;
        $dokter->nip = $request->nip;
        $dokter->spesialis = $request->spesialis;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $dokter->foto = $path;
        }

        $dokter->save();
        return redirect()->route('admin/dokter')->with('sukses', 'Data berhasil diubah');
    }

    function hapusdokter($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();
        return response()->json(['success', 'data berhasil dihapus']);
    }

    function updateantrian(Request $request)
    {
        $antrian = Antrian::find($request->id);
        $antrian->status = 1;
        $antrian->save();

        return response()->json(['success', 'Data berashil diupdate']);
    }
}
