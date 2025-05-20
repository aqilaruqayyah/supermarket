@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<a href="{{ route('kategori.create') }}">Tambah Kategori</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $kategori->id }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a href="{{ route('kategori.show', $kategori->id) }}">Detail</a> |
                <a href="{{ route('kategori.edit', $kategori->id) }}">Edit</a> |
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus kategori ini?')">
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
