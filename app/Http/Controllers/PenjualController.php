<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function index()
    {
        $penjual = Penjual::all();
        return response()->json($penjual);
    }

    public function create()
    {
        return response()->json(['message' => 'Form tambah penjual']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable'
        ]);

        Penjual::create($request->all());

        return response()->json(['message' => 'Penjual berhasil disimpan']);
    }

    public function show($id)
    {
        $penjual = Penjual::findOrFail($id);
        return response()->json($penjual);
    }

    public function edit($id)
    {
        $penjual = Penjual::findOrFail($id);
        return response()->json($penjual);
    }

    public function update(Request $request, $id)
    {
        $penjual = Penjual::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'nullable'
        ]);

        $penjual->update($request->all());

        return response()->json(['message' => 'Penjual berhasil diupdate']);
    }

    public function destroy($id)
    {
        $penjual = Penjual::findOrFail($id);
        $penjual->delete();

        return response()->json(['message' => 'Penjual berhasil dihapus']);
    }
}
