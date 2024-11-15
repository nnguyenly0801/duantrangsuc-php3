@extends('admin.layout')

@section('title', 'Sửa sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Sửa sản phẩm</h2>
        <a href="{{route('admin.categories.list')}}">Quay lại danh sách sản phẩm</a>

        <form action="{{route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" id="" class="form-control" value="{{$category->name}}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Sửa</button>
        </form>
    </div>

@endsection
