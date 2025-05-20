@extends('layouts.app')

@section('title', 'Tambah Pembeli')

@section('content')
<form action="{{ route('pembeli.store') }}" method="POST">
    @csrf

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required><br><br>


    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('pembeli.index') }}">Kembali</a>
@endsection
