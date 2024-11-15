@extends('index')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="mt-3 container">
        <h2 class=" text-center">
            <a href="#"
                class="link-danger text-secondary text-decoration-none fw-bolder text-uppercase">@yield('title')</a>
        </h2>

        <!-- SẮP XẾP -->
        {{-- <div class="d-flex align-items-center justify-content-center">
        <div class="m-3">
            <label class=""><i class="fa-solid fa-arrow-down-a-z"></i> Sắp xếp theo:</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="newest" value="newest">
            <label class="form-check-label" for="newest">Mới nhất</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="oldest" value="oldest">
            <label class="form-check-label" for="oldest">Cũ nhất</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="az" value="az">
            <label class="form-check-label" for="az">Từ A-Z</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="za" value="za">
            <label class="form-check-label" for="za">Từ Z-A</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="ascending" value="ascending">
            <label class="form-check-label" for="ascending">Giá tăng dần</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sortOption" id="descending" value="descending">
            <label class="form-check-label" for="descending">Giá giảm dần</label>
        </div>
    </div> --}}

        <!-- BỘ LỌC -->
        {{-- <select class="form-control bg-light m-auto" style="width: 70%;">
            <option value="" disabled selected>Lọc theo danh mục</option>
            @foreach ($category as $cate)
                <option value="ascending"><a class="dropdown-item"
                        href="{{ url('/category/' . $cate->id) }}">{{ $cate->name }}</a></option>
            @endforeach
        </select> --}}

        <!-- Sản phẩm -->
        <div class="bg-light p-3 mb-3 mt-3">
            <div class="container mt-5 mb-5 text-center">
                <div class="row shadow p-3">
                    @foreach ($products as $item)
                        <div class="col-3">
                            <img src="{{ $item->image }}" alt="" width="255px" height="330px">
                            <div class="p-3">
                                <a href="{{ url('/detail/' . $item->id) }}"
                                    class="link-warning text-dark text-decoration-none"
                                    style="font-size: 14px;">{{ $item->name }}</a>
                                <div>
                                    <span class="fs-5 fw-bold text-danger">{{ $item->price }}</span>
                                    <span class="text-decoration-line-through" class=" ml-2"
                                        style="font-size: 12px">17.000VND</span>
                                </div>
                            </div>
                        </div>
                    @endforeach



            </div>
        </div>
    </div>
@endsection
