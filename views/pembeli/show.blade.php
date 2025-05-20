@extends('layouts.app')

@section('title', 'Detail Pembeli')

@section('content')
<p><strong>ID:</strong> {{ $pembeli->id }}</p>
<p><strong>Nama Pembeli:</strong> {{ $pembeli->nama }}</p>

<a href="{{ route('pembeli.index') }}">Kembali</a>
@endsection
