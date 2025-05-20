@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama) }}" required><br><br>

    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>

<a href="{{ route('kategori.index') }}">Kembali</a>
@endsection
