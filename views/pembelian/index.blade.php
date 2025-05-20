@extends('layouts.app')

@section('title', 'Daftar Pembelian')

@section('content')
<a href="{{ route('pembelian.create') }}">Tambah Pembelian</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Pembeli</th>
            <th>ID Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembelians as $pembelian)
        <tr>
            <td>{{ $pembelian->id }}</td>
            <td>{{ $pembelian->pembeli_id }}</td>
            <td>{{ $pembelian->produk_id }}</td>
            <td>{{ $pembelian->jumlah }}</td>
            <td>{{ $pembelian->total_harga }}</td>
            <td>
                <a href="{{ route('pembelian.show', $pembelian->id) }}">Detail</a> |
                <a href="{{ route('pembelian.edit', $pembelian->id) }}">Edit</a> |
                <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
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
