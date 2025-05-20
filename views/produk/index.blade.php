@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<h1>Daftar Produk</h1>
<a href="{{ route('produk.create') }}">Tambah Produk</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>ID Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
        <tr>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->kategori_id}}</td>
            <td>
                <a href="{{ route('produk.show', $produk->id) }}">Detail</a> |
                <a href="{{ route('produk.edit', $produk->id) }}">Edit</a> |
                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
