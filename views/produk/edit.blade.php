@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<h1>Edit Produk</h1>

<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Produk:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" required><br><br>

    
    <label>ID Kategori:</label><br>
    <input type="number" name="kategori_id" value="{{ old('kategori_id', $produk->kategori_id) }}" required><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('produk.index') }}">Kembali</a>
@endsection
