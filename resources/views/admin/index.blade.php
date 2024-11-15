@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-3">
        <h2 class="text-uppercase text-center">Trang chủ</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Sản Phẩm</h5>
                        <p class="card-text">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Sản Phẩm Theo Danh Mục</h5>
                        <ul>
                            @foreach ($productsByCategory as $product)
                                <p>Danh mục: {{ $product->name }} - Số lượng sản phẩm: {{ $product->total_products }}</p>
                            @endforeach
                        </ul>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
