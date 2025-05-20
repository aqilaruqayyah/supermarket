@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <label for="nama">Nama Kategori</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required><br><br>

    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('kategori.index') }}">Kembali</a>
@endsection
