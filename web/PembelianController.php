<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Pembeli;
use App\Models\Produk;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with(['pembeli', 'produk'])->get();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $pembelis = Pembeli::all();
        $produks = Produk::all();
        return view('pembelian.create', compact('pembelis', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total_harga = $produk->harga * $request->jumlah;

        Pembelian::create([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan');
    }

    public function show($id)
    {
        $pembelian = Pembelian::with(['pembeli', 'produk'])->findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelis = Pembeli::all();
        $produks = Produk::all();
        return view('pembelian.edit', compact('pembelian', 'pembelis', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total_harga = $produk->harga * $request->jumlah;

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }
}
