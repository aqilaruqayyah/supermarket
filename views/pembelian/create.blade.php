@extends('layouts.app')

@section('title', 'Tambah Pembelian')

@section('content')
<form action="{{ route('pembelian.store') }}" method="POST">
    @csrf

    <label for="pembeli_id">ID Pembeli</label><br>
    <input type="number" name="pembeli_id" id="pembeli_id" required><br><br>

    <label for="produk_id">ID Produk</label><br>
    <input type="number" name="produk_id" id="produk_id" required><br><br>

    <label for="jumlah">Jumlah</label><br>
    <input type="number" name="jumlah" id="jumlah" required><br><br>

    <label for="total_harga">Total</label><br>
    <input type="number" name="total_harga" id="total_harga" required><br><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('pembelian.index') }}">Kembali</a>
@endsection
