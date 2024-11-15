@extends('index')

@section ('title', 'Trang chủ')

@section('content')

<div class="container m-5">
    @if (session('message'))
        <div class="alert bg-primary text-white">
            {{ session('message') }}
        </div>
    @endif

    <h2>Thông tin của bạn</h2>

    @if ($user->role == 'admin')
        <p><a href="{{ route('admin.index') }}">Đến trang quản trị</a></p>
    @endif

    <p><b>Họ và tên:</b> {{ $user->fullname }} </p>
    <p><b>Username:</b> {{ $user->username }} </p>
    <p><b>Email</b> {{ $user->email }} </p>
    <p><b>Address</b> {{ $user->address }} </p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Đăng xuất</a>
    <a href="{{ route('user.update') }}" class="btn btn-primary">Cập nhật</a>
        <a href="{{ route('user.change-password') }}" class="btn btn-success">Đổi mật khẩu</a>
</div>


@endsection