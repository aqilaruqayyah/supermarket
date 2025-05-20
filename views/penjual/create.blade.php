@extends('layouts.app')

@section('title', 'Tambah Penjual')

@section('content')
<form action="{{ route('penjual.store') }}" method="POST">
    @csrf

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required><br><br>

    <label for="alamat">Alamat</label><br>
    <input type="alamat" name="alamat" id="alamat" value="{{ old('alamat') }}" nullable><br><br>


    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror
    @error('email')
    <div style="color:red;">{{ $message }}</div>
    @enderror
    @error('alamat')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('penjual.index') }}">Kembali</a>
@endsection
