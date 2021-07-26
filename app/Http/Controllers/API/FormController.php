<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lapangan;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'jumlah_lapangan' => 'required',
            'luas_lapangan' => 'required'
        ]);

        // dd($request->all());
        $lapangan = new Lapangan;
        $lapangan->nama_lapangan = $request->nama_lapangan;
        $lapangan->jumlah_lapangan = $request->jumlah_lapangan;
        $lapangan->luas_lapangan = $request->luas_lapangan;
        $lapangan->save();

        return response()->json([
                'message'       => 'Lapangan Berhasil Ditambahkan',
                'data_Lapangan'  => $lapangan
            ], 200);
    }

    public function edit($id)
    {
        $lapangan = Lapangan::find($id);
        return response()->json([
                'message'       => 'success',
                'data_Lapangan'  => $lapangan
            ], 200);
    }

    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::find($id);

        $request->validate([
            'nama_lapangan' => 'required',
            'jumlah_lapangan' => 'required',
            'luas_lapangan' => 'required'
        ]);

        $lapangan->update([
            'nama_lapangan' => $request->nama_lapangan,
            'jumlah_lapangan' => $request->jumlah_lapangan,
            'luas_lapangan' => $request->luas_lapangan
        ]);

        return response()->json([
                'message'       => 'success',
                'data_Lapangan'  => $lapangan
            ], 200);
    }

    public function delete($id)
    {
        $lapangan = Lapangan::find($id)->delete();

        return response()->json([
                'message'       => 'data Lapangan berhasil dihapus'
            ], 200);
    }
}
