@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <!-- Optional Header -->
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- IMAGE -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       name="image">
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- TITLE -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       name="title" 
                                       value="{{ old('title') }}" 
                                       placeholder="Masukkan Judul Product">
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- DESCRIPTION -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          name="description" 
                                          rows="5" 
                                          placeholder="Masukkan Deskripsi Product">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <!-- PRICE -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" 
                                               class="form-control @error('price') is-invalid @enderror" 
                                               name="price" 
                                               value="{{ old('price') }}" 
                                               placeholder="Masukkan Harga Product">
                                        @error('price')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- STOCK -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" 
                                               class="form-control @error('stock') is-invalid @enderror" 
                                               name="stock" 
                                               value="{{ old('stock') }}" 
                                               placeholder="Masukkan Stock Product">
                                        @error('stock')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- BUTTONS -->
                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.24.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection
