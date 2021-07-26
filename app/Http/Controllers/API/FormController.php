<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'nip' => 'required',
            'no_tlpn' => 'required',
            'agama' => 'required',
            'alamat' => 'required'
        ]);

        // dd($request->all());
        $karyawan = new Karyawan;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->nip = $request->nip;
        $karyawan->no_tlpn = $request->no_tlpn;
        $karyawan->agama = $request->agama;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return response()->json([
                'message'       => 'Karyawan Berhasil Ditambahkan',
                'data_Karyawan'  => $karyawan
            ], 200);
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $karyawan
            ], 200);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        $request->validate([
            'nama_karyawan' => 'required',
            'nip' => 'required',
            'no_tlpn' => 'required',
            'agama' => 'required',
            'alamat' => 'required'
        ]);

        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'nip' => $request->nip,
            'no_tlpn' => $request->no_tlpn,
            'agama' => $request->agama,
            'alamat' => $request->alamat
        ]);

        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $karyawan
            ], 200);
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id)->delete();

        return response()->json([
                'message'       => 'data Karyawan berhasil dihapus'
            ], 200);
    }
}
