@extends('dashboard.layout.layout')
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.users') }}">User</a></li>
                        <li class="breadcrumb-item active">Add_User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Edit product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update',[($product->id)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Product name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$product->name) }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock"
                                class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock',$product->stock) }}"
                                required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Expried at -->
                        <div class="mb-3">
                            <label for="expired_at" class="form-label">Expired at</label>
                            <input type="date" name="expired_at" id="expired_at"
                                class="form-control @error('expired_at') is-invalid @enderror"
                                value="{{ old('expired_at',$product->expired_at) }}">
                            @error('expired_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- avata --}}
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Update product image:</label>
                            <br>
                            @if ($product->avatar)
                                <img src="{{ asset('storage/product/' . $product->avatar) }}" alt="Avatar" width="150" class="img-thumbnail">
                            @else
                                <p>Không có ảnh</p>
                            @endif
                            <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*" value="{{ old('avatar',$product->avatar) }}">
                        </div>
                        <!-- sku -->
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" name="sku" id="sku"
                                class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku',$product->sku) }}"
                                required>
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Categories --}}
                        <div class="mb-3">
                            <label for="category_id" class="form-label">select category</label>
                            <select name="category_id" class="form-control">
                                <option value="{{ $product->category_id }}">-- Choose an category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
