@extends('theme.default')

@section('content')
<div class="container">
    <h1>Edit Kustomer</h1>
    <form action="{{ route('kustomer.update', $kustomer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $kustomer->nik }}" required>
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $kustomer->name }}" required>
        </div>
        <div class="form-group">
            <label for="telpon">Telpon</label>
            <input type="text" name="telpon" id="telpon" class="form-control" value="{{ $kustomer->telpon }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $kustomer->email }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ $kustomer->alamat }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
