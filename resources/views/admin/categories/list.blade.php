@extends('admin.layout')

@section('title', 'Danh sách sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Danh sách sản phẩm</h2>
        
        @if (session('message'))
            <div class="alert bg-primary text-white">
                {{ session('message') }}
            </div>
        @endif

        <div class="text-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-plus"></i> Thêm
                mới</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Action</th>
            </tr>
            @foreach ($categories as $cate)
                <tr>
                    <td style="width: 1px;">{{ $cate->id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td style="width: 1px; white-space: nowrap;" class="text-nowrap">
                        <a href="xemsp.html" class="btn btn-warning"><i class="fa-regular fa-eye"></i> Xem</a>
                        <a class="btn btn-danger" href="{{ route('admin.categories.edit', $cate->id) }}"><i
                                class="fa-solid fa-pen"></i> Sửa</a>
                        <form action="{{ route('admin.categories.destroy', $cate->id) }}" method="post"
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
