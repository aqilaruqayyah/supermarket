@extends('layouts.app')

@section('title', 'Edit Pembeli')

@section('content')
<form action="{{ route('pembeli.update', $pembeli->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $pembeli->nama) }}" required><br><br>

    @error('nama')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>

<a href="{{ route('pembeli.index') }}">Kembali</a>
@endsection
