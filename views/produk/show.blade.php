@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<h1>Detail Produk</h1>

<p><strong>Nama Produk:</strong> {{ $produk->nama }}</p>
<p><strong>Harga:</strong> {{ $produk->harga }}</p>
<p><strong>Stok:</strong> {{ $produk->stok }}</p>
<p><strong>ID Kategori:</strong> {{ $produk->kategori_id }}</p>

<a href="{{ route('produk.index') }}">Kembali</a>
@endsection
