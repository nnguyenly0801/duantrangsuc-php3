@extends('admin.layout')

@section('title', 'Cập nhật User')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Cập nhật user</h2>
        <a href="{{ route('admin.users.list') }}">Quay lại danh sách user</a>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mt-3">
                <label for="">Fullname</label>
                <input type="text" name="fullname" id="" class="form-control" value="{{$user->fullname}}">
            </div>
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control" value="{{$user->username}}">
            </div>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{$user->email}}">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Address</label>
                <input type="text" name="address" id="" class="form-control" value="{{$user->address}}">
            </div>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="" selected disabled>Chọn vai trò</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        </form>
    </div>

@endsection
