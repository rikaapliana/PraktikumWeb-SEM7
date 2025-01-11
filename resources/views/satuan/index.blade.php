@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Satuan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Satuan</li>
    </ol>

    <a href="{{ route('satuan.create') }}" class="btn btn-primary mb-3">Add New Satuan</a>

    <div class="card mb-4">
        <div class="card-header">
            Satuan List
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($satuans as $satuan)
                        <tr>
                            <td>{{ $satuan->id }}</td>
                            <td>{{ $satuan->name }}</td>
                            <td>{{ $satuan->description }}</td>
                            <td>
                                <a href="{{ route('satuan.show', $satuan->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('satuan.edit', $satuan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('satuan.destroy', $satuan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
