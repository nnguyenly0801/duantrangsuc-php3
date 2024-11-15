@extends('admin.layout')

@section('title', 'Sửa sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Sửa sản phẩm</h2>
        <a href="{{route('admin.products.list')}}">Quay lại danh sách sản phẩm</a>

        <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" id="" class="form-control" value="{{$product->name}}">
            </div>

            <div class="mt-3">
                <label for="">Ảnh</label>
                <input type="file" name="image" id="" class="form-control">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="mw-100 mh-100">
            </div>

            <div class="mt-3">
                <label for="">Giá</label>
                <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
            </div>

            <div class="mt-3">
                <label for="">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{$product->quantity}}">
            </div>

            <div class="mt-3">
                <label for="">Mô tả</label>
                <textarea name="description" id="" class="form-control" >{{$product->description}}</textarea>
            </div>

            <div class="mt-3">
                <label for="">Danh mục</label>
                <select name="category_id" id="" class="form-control" >
                    @foreach ($categories as $cate)
                    <option value="{{$cate->id}}"
                        @if ($cate->id == $product->category_id) selected @endif>
                        {{$cate->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Sửa</button>
        </form>
    </div>

@endsection
