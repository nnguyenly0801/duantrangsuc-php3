@extends('admin.layout')

@section('title', 'Sửa sản phẩm')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Xem chi tiết sản phẩm</h2>
        <a href="{{ route('admin.products.list') }}">Quay lại danh sách sản phẩm</a>

        <form action="">
            <div class="mt-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="" id="" class="form-control" value="{{ $product->name }}" disabled>
            </div>

            <div class="mt-3">
                <label for="">Ảnh</label>
                <div class="justify-content-center align-items-center d-flex rounded overflow-auto bg-light border mt-1"
                    style="width: 100px; height: 100px;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="mw-100 mh-100">
                </div>
            </div>

            <div class="mt-3">
                <label for="">Giá</label>
                <input type="text" name="" id="" class="form-control" value="{{ $product->price }}"
                    disabled>
            </div>

            <div class="mt-3">
                <label for="">Mô tả</label>
                <textarea name="" id="" class="form-control" rows="4" disabled>
                    {{ $product->description }}
            </textarea>
            </div>
        </form>
    </div>

@endsection
