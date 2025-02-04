@extends('theme.default')

@section('content')
<div class="container">
    <h1>Detail Kustomer</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kustomer->name }}</h5>
            <p class="card-text"><strong>NIK:</strong> {{ $kustomer->nik }}</p>
            <p class="card-text"><strong>Telpon:</strong> {{ $kustomer->telpon }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $kustomer->email }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $kustomer->alamat }}</p>
        </div>
    </div>
    <a href="{{ route('kustomer.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('kustomer.edit', $kustomer->id) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection
