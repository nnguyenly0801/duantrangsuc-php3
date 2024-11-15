@extends('admin.layout')

@section('title', 'Danh sách Users')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Danh sách Users</h2>

        @if (session('message'))
            <div class="alert bg-primary text-white">
                {{ session('message') }}
            </div>
        @endif

        <div class="text-end">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-plus"></i> Thêm
                mới</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td style="width: 1px;">{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->role }}</td>
                    <td style="width: 1px; white-space: nowrap;" class="text-nowrap">
                        <a href="xemsp.html" class="btn btn-warning"><i class="fa-regular fa-eye"></i> Xem</a>
                        <a class="btn btn-danger" href="{{ route('admin.users.edit', $user->id) }}"><i
                                class="fa-solid fa-pen"></i> Sửa</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary"
                                onclick="return confirm('Bạn có chắc xóa không?')">
                                Xóa
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>

@endsection
