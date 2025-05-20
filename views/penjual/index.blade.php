@extends('layouts.app')

@section('title', 'Daftar Penjual')

@section('content')
<a href="{{ route('penjual.create') }}">Tambah Penjual</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Penjual</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjuals as $penjual)
        <tr>
            <td>{{ $penjual->id }}</td>
            <td>{{ $penjual->nama}}</td>
            <td>{{ $penjual->email }}</td>
            <td>{{ $penjual->alamat }}</td>
            <td>
                <a href="{{ route('penjual.show', $penjual->id) }}">Detail</a> |
                <a href="{{ route('penjual.edit', $penjual->id) }}">Edit</a> |
                <form action="{{ route('penjual.destroy', $penjual->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus penjual ini?')">
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
