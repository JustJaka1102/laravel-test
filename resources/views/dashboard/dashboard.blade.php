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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container mt-5">
            <h1 class="mb-4">Danh sách người dùng</h1>
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Tên người dùng</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có người dùng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        
            <!-- pani -->
            <div class="d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
