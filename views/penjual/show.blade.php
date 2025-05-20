@extends('layouts.app')

@section('title', 'Detail Penjual')

@section('content')
<p><strong>ID:</strong> {{ $penjual->id }}</p>
<p><strong>Nama Penjual:</strong> {{ $penjual->nama }}</p>
<p><strong>Email:</strong> {{ $penjual->email }}</p>
<p><strong>Alamat:</strong> {{ $penjual->alamat }}</p>

<a href="{{ route('penjual.index') }}">Kembali</a>
@endsection
