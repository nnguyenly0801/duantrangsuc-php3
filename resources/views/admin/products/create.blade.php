@extends('admin.layout')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Thêm mới sản phẩm</h2>
        <a href="{{route('admin.products.list')}}">Quay lại danh sách sản phẩm</a>

        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" id="" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Ảnh</label>
                <input type="file" name="image" id="" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Giá</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Mô tả</label>
                <textarea name="description" id="" class="form-control"></textarea>
            </div>

            <div class="mt-3">
                <label for="">Danh mục</label>
                <select name="category_id" id="" class="form-control" >
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
        </form>
    </div>

@endsection
