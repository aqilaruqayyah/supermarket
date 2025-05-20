@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<p><strong>ID:</strong> {{ $kategori->id }}</p>
<p><strong>Nama Kategori:</strong> {{ $kategori->nama }}</p>

<a href="{{ route('kategori.index') }}">Kembali</a>
@endsection
