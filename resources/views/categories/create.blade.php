@extends('theme.default')

@section('content')
<div class="container mt-4">
    <h1>Add Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
