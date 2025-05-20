@extends('layouts.app')

@section('title', 'Edit Penjual')

@section('content')
<form action="{{ route('penjual.update', $penjual->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $penjual->nama) }}" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="{{ old('email', $penjual->email) }}" required><br><br>

    <label for="alamat">Telepon</label><br>
    <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $penjual->alamat) }}" nullable><br><br>

    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror
    @error('email')
    <div style="color:red;">{{ $message }}</div>
    @enderror
    @error('alamat')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>

<a href="{{ route('penjual.index') }}">Kembali</a>
@endsection
