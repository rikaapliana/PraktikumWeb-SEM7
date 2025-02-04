@extends('theme.default')

@section('content')
<div class="container">
    <h1>Daftar Kustomer</h1>
    <a href="{{ route('kustomer.create') }}" class="btn btn-primary">Tambah Kustomer</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kustomers as $kustomer)
                <tr>
                    <td>{{ $kustomer->id }}</td>
                    <td>{{ $kustomer->nik }}</td>
                    <td>{{ $kustomer->name }}</td>
                    <td>{{ $kustomer->telpon }}</td>
                    <td>{{ $kustomer->email }}</td>
                    <td>{{ $kustomer->alamat }}</td>
                    <td>
                        <a href="{{ route('kustomer.show', $kustomer) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('kustomer.edit', $kustomer) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kustomer.destroy', $kustomer) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
