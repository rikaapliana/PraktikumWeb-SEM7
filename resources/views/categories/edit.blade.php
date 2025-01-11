@extends('theme.default')

@section('content')
<div class="container mt-4">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
