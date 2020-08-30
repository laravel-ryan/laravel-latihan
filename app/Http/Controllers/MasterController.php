<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {

        return view('pages.master');
    }

    public function store(Request $request)
    {
        $alert = [
            'success' => false,
            'messages' => []
        ];
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        $simpan = new Master(); // instance class
        $simpan->nama = $nama;
        $simpan->alamat = $alamat;

        if ($simpan->save()) {
            $alert['success'] = true;
            $alert['messages'] = 'Berhasil menambah data baru';
        }

        return $alert;
    }

    public function edit($id)
    {
        $master = Master::findOrFail($id);

        return $master;
    }

    public function update(Request $request, $id)
    {
        $alert = [
            'success' => false,
            'messages' => []
        ];
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        $simpan = Master::findOrFail($id);
        $simpan->nama = $nama;
        $simpan->alamat = $alamat;
        if ($simpan->save()) {
            $alert['success'] = true;
            $alert['messages'] = 'Berhasil memperbaharui data';
        }

        return $alert;
    }

    public function loadTable()
    {
        $master = Master::all();

        return view('actions.table_master')->with('master', $master);
    }

    public function destroy($id)
    {
        $alert = [
            'success' => false,
            'messages' => []
        ];
        $master = Master::findOrFail($id);
        if ($master->delete()) {
            $alert['success'] = true;
        }

        return $alert;
    }
}
