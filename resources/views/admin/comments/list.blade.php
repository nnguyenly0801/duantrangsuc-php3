@extends('admin.layout')

@section('title', 'Danh sách bình luận')

@section('content')
    <h1>Danh sách bình luận</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Bình luận</th>
                <th>Ngày bình luận</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user_name ? $comment->user_name : 'Người dùng ẩn danh' }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
