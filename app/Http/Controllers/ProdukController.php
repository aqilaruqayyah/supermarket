<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return response()->json($produk); // nanti bisa diganti tampilan view
    }

    public function create()
    {
        $kategori = Kategori::all();
        return response()->json($kategori); // nanti bisa ganti return view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        Produk::create($request->all());

        return response()->json(['message' => 'Produk berhasil disimpan']);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        $produk->update($request->all());

        return response()->json(['message' => 'Produk berhasil diupdate']);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
