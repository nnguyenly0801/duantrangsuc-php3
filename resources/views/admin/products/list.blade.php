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
            <a href="{{ route('admin.products.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-plus"></i> Thêm
                mới</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $pd)
                <tr>
                    <td style="width: 1px;">{{ $pd->id }}</td>
                    <td>{{ $pd->name }}</td>
                    <td style="width: 1px;">
                        <div class="justify-content-center align-items-center d-flex rounded overflow-auto bg-light border m-auto"
                            style="width: 100px; height: 100px;">
                            <img src="{{ asset('storage/' . $pd->image) }}" alt="" class="mw-100 mh-100">
                        </div>
                    </td>
                    <td>{{ $pd->price }}</td>
                    <td>{{ $pd->description }}</td>
                    <td>{{ $pd->quantity }}</td>
                    <td>{{ $pd->category->name }}</td>
                    <td style="width: 1px; white-space: nowrap;" class="text-nowrap">
                        <a href="{{ route('admin.products.detail', $pd->id) }}" class="btn btn-warning"><i class="fa-regular fa-eye"></i> Xem</a>
                        <a class="btn btn-danger" href="{{ route('admin.products.edit', $pd->id) }}"><i
                                class="fa-solid fa-pen"></i> Sửa</a>
                        <form action="{{ route('admin.products.destroy', $pd->id) }}" method="post"
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

    <!-- Hiển thị phân trang -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>

@endsection
