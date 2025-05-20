@extends('layouts.app')

@section('title', 'Detail Pembelian')

@section('content')
<p><strong>ID:</strong> {{ $pembelian->id }}</p>
<p><strong>ID Pembeli:</strong> {{ $pembelian->pembeli_id }}</p>
<p><strong>ID Produk:</strong> {{ $pembelian->produk_id }}</p>
<p><strong>Jumlah:</strong> {{ $pembelian->jumlah }}</p>
<p><strong>Total Harga:</strong> {{ $pembelian->total_harga }}</p>

<a href="{{ route('pembelian.index') }}">Kembali</a>
@endsection
