@extends('admin.layout')

@section('title', 'Thêm mới User')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Thêm mới user</h2>
        <a href="{{ route('admin.users.list') }}">Quay lại danh sách user</a>

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="">Fullname</label>
                <input type="text" name="fullname" id="" class="form-control">
            </div>
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control">
            </div>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Address</label>
                <input type="text" name="address" id="" class="form-control">
            </div>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="" selected disabled>Chọn vai trò</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="mt-3">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div>
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
        </form>
    </div>

@endsection
