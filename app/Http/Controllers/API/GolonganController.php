<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\karyawan;

class GolonganController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        $karyawan            = new Karyawan;
        $karyawan->nama_karyawan      = $request->nama_karyawan;
        $karyawan->nip    = $request->nip;
        $karyawan->no_tlpn   = $request->no_tlpn;
        $karyawan->agama = $request->agama;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        foreach ($request->list_golongan as $key => $value) {
            Golongan::create([
                'nama_golongan' => $value['nama_golongan'],
                'gaji_pokok' => $value['gaji_pokok'],
                'tunjangan_istri' => $value['tunjangan_istri'],
                'tunjangan_anak' => $value['tunjangan_anak'],
                'id_Karyawan' => $karyawan->id
            ]);
            $golongan = Golongan::create($golongan);
        }

        return response()->json([
                'message'       => 'success'
            ], 200);
    }
    public function edit($id)
    {
        $golongan= Golongan::find($id);
        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $golongan
            ], 200);
    }
    public function update(Request $request, $id)
    {
        $golongan= Golongan::find($id)->update;
        
        $karyawan            = new Karyawan;
        $karyawan->nama_karyawan      = $request->nama_karyawan;
        $karyawan->nip    = $request->nip;
        $karyawan->no_tlpn   = $request->no_tlpn;
        $karyawan->agama = $request->agama;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        foreach ($request->list_golongan as $key => $value) {
            $golongan = array(
                'nama_golongan' => $value['nama_golongan'],
                'gaji_pokok' => $value['gaji_pokok'],
                'tunjangan_istri' => $value['tunjangan_istri'],
                'tunjangan_anak' => $value['tunjangan_anak'],
                'id_Karyawan' => $karyawan->id
            );
        }



        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $golongan
            ], 200);
    }

    public function delete($id)
    {
        $golongan = Golongan::find($id)->delete();

        return response()->json([
                'message'       => 'data Golongan berhasil dihapus'
            ], 200);
    }
}
