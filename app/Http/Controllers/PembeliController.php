<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $pembeli = Pembeli::all();
        return response()->json($pembeli);
    }

    public function create()
    {
        return response()->json(['message' => 'Form tambah pembeli']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Pembeli::create($request->all());

        return response()->json(['message' => 'Pembeli berhasil disimpan']);
    }

    public function show($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return response()->json($pembeli);
    }

    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return response()->json($pembeli);
    }

    public function update(Request $request, $id)
    {
        $pembeli = Pembeli::findOrFail($id);

        $request->validate([
            'nama' => 'required'
        ]);

        $pembeli->update($request->all());

        return response()->json(['message' => 'Pembeli berhasil diupdate']);
    }

    public function destroy($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();

        return response()->json(['message' => 'Pembeli berhasil dihapus']);
    }
}
