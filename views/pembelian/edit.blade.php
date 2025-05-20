@extends('layouts.app')

@section('title', 'Edit Pembelian')

@section('content')
<form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="pembeli_id">ID Pembeli</label><br>
    <input type="number" name="pembeli_id" id="pembeli_id" value="{{ old('pembeli_id', $pembelian->pembeli_id) }}" required><br><br>

    <label for="produk_id">ID Produk</label><br>
    <input type="number" name="produk_id" id="produk_id" value="{{ old('produk_id', $pembelian->produk_id) }}" required><br><br>


    <label for="jumlah">Jumlah</label><br>
    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $pembelian->jumlah) }}" required><br><br>

    <label for="total_harga">Total</label><br>
    <input type="number" name="total_harga" id="total_harga" value="{{ old('total_harga', $pembelian->total_harga) }}" required><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('pembelian.index') }}">Kembali</a>
@endsection
