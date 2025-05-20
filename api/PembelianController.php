<?php

namespace App\Http\Controllers\api;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Penjual;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        // Menampilkan semua pembelian
        $pembelian = Pembelian::with(['produk', 'penjual', 'pembeli'])->get();
        return response()->json($pembelian);
    }

    public function create()
    {
        // Return form untuk tambah pembelian (untuk frontend)
        return response()->json(['message' => 'Form tambah pembelian']);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pembeli_id' => 'required',
            'produk_id' => 'required',
            'penjual_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari produk dan penjual berdasarkan ID
        $produk = Produk::findOrFail($request->produk_id);
        $penjual = Penjual::findOrFail($request->penjual_id);

        // Hitung total harga
        $total_harga = $produk->harga * $request->jumlah;

        // Simpan transaksi pembelian
        Pembelian::create([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'penjual_id' => $request->penjual_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        // Return response sukses
        return response()->json(['message' => 'Pembelian berhasil dilakukan']);
    }

    public function show($id)
    {
        // Menampilkan detail pembelian berdasarkan ID
        $pembelian = Pembelian::with(['produk', 'penjual', 'pembeli'])->findOrFail($id);
        return response()->json($pembelian);
    }

    public function edit($id)
    {
        // Menampilkan form edit pembelian
        $pembelian = Pembelian::findOrFail($id);
        return response()->json($pembelian);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'pembeli_id' => 'required',
            'produk_id' => 'required',
            'penjual_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);

        // Cari produk dan penjual berdasarkan ID
        $produk = Produk::findOrFail($request->produk_id);
        $penjual = Penjual::findOrFail($request->penjual_id);

        // Hitung total harga
        $total_harga = $produk->harga * $request->jumlah;

        // Update pembelian
        $pembelian->update([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'penjual_id' => $request->penjual_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        // Return response sukses
        return response()->json(['message' => 'Pembelian berhasil diupdate']);
    }

    public function destroy($id)
    {
        // Hapus pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        // Return response sukses
        return response()->json(['message' => 'Pembelian berhasil dihapus']);
    }
}
