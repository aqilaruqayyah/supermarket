@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<h1>Tambah Produk</h1>

<form action="{{ route('produk.store') }}" method="POST">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ old('harga') }}" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok') }}" required><br><br>

    <label>ID Kategori:</label><br>
    <input type="number" name="kategori_id" value="{{ old('kategori_id') }}" required><br><br>



    <button type="submit">Simpan</button>
</form>

<a href="{{ route('produk.index') }}">Kembali</a>
@endsection
