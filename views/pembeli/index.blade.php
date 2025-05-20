@extends('layouts.app')

@section('title', 'Daftar Pembeli')

@section('content')
<a href="{{ route('pembeli.create') }}">Tambah Pembeli</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembelis as $pembeli)
        <tr>
            <td>{{ $pembeli->id }}</td>
            <td>{{ $pembeli->nama }}</td>
            <td>
                <a href="{{ route('pembeli.show', $pembeli->id) }}">Detail</a> |
                <a href="{{ route('pembeli.edit', $pembeli->id) }}">Edit</a> |
                <form action="{{ route('pembeli.destroy', $pembeli->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus pembeli ini?')">
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

