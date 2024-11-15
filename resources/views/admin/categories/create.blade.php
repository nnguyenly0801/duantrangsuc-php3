@extends('admin.layout')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Thêm mới sản phẩm</h2>
        <a href="{{route('admin.categories.list')}}">Quay lại danh sách sản phẩm</a>

        <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
        </form>
    </div>

@endsection
