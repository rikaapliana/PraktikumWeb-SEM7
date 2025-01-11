@extends('theme.default')

@section('content')
<div class="container mt-4">
    <h1>Category Details</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>

    <div class="card">
        <div class="card-header">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $category->id }}</p>
            <p><strong>Description:</strong> {{ $category->description }}</p>
            <!-- Add more details if needed -->
        </div>
    </div>
</div>
@endsection
