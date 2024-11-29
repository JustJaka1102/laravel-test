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
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{route('product_category.update',[($product_category->id)])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="name" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name',$product_category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <!-- parent id -->
                         <div class="mb-3">
                            <label for="parent_id" class="form-label">select parent category</label>
                            <select name="parent_id" class="form-control">
                                <option value="">-- no parent --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection