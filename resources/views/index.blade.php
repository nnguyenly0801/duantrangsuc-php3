<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- 1. Nhúng thư viện bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 2. Nhúng thư viện font icon -->
    <script src="https://kit.fontawesome.com/41dd1b16b5.js"></script>

</head>

<body ng-app="myApp">

    <!-- Header -->
    <div>
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow" style="height: 150px;">

            <div class="container">

                <!-- UL logo -->
                <ul class="navbar-nav me-4">
                    <li class="nav-item">
                        <img style="height: 80px;" src="{{ asset('uploads/logo.webp') }}" alt="">
                    </li>
                </ul>

                <!--UL danh mục-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="text-light nav-link text-uppercase me-4" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link text-uppercase me-4" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link text-uppercase me-4" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link text-uppercase me-4 dropdown-toggle"
                            href="{{ route('products') }}" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $cate)
                                <li><a class="dropdown-item"
                                        href="{{ url('/category/' . $cate->id) }}">{{ $cate->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <!-- UL đăng nhập đăng kí -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="text-light nav-link text-uppercase me-2" href="#"><i
                                class="fa-solid fa-magnifying-glass"></i></a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link text-uppercase me-2" href="#" role="button"
                            data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i></a>
                        <ul class="dropdown-menu">
                            @if (Auth::check())
                            {{-- Người dùng đã đăng nhập --}}
                            <a href="{{ route('profile', $user->id) }}"><p class="dropdown-item">Hi {{$user->username}}</p></a>
                            @if (Auth::user()->role == 'admin')
                                <p><a class="dropdown-item" href="{{ route('admin.index') }}">Đến trang quản trị</a></p>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                        @else
                            {{-- Người dùng chưa đăng nhập --}}
                            <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                        @endif
                        
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link text-uppercase me-2" href="{{ route('cart') }}"><i
                                class="fa-solid fa-cart-shopping"></i></a>

                    </li>
                </ul>
            </div>

        </nav>

        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('uploads/banner 1.webp') }}" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('uploads/banner 2.webp') }}" alt="Chicago" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('uploads/banner 3.webp') }}" alt="New York" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>


    <!-- Body -->
    <div>
        @yield('content')
    </div>

    <!-- FOOTER -->
    <div class="footer text-light bg-dark p-5" style="height: 578px;">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h4>CHÍNH SÁCH HỖ TRỢ</h4>
                    <ul>
                        <li class="mb-3">
                            <a href="" class="nav-link">Chính sách thanh toán</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Chính sách Đổi trả</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Chính sách bảo hành</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Chính sách vận chuyển</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Chính sách bảo mật thông tin</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-center">
                    <img src="{{ asset('uploads/logo.webp') }}" alt="" class="mb-3">
                    <p>"Every Piece Of Our Jewelry Tells A Story"</p>
                    <p>
                        CÔNG TY CỔ PHẦN TRANG SỨC CÁO BẠC </p>
                    <p>
                        Địa chỉ: Số 1 ngõ 121 Chùa Láng, Láng Thượng, Đống Đa, Hà Nội
                    </p>
                    <p>
                        SĐT: 0382496087
                    </p>
                    <p>
                        Email: caobaconline@gmail.com
                    </p>
                    <p>
                        Giấy chứng nhận ĐKKD số 0108361160 do Sở KH&ĐT thành phố Hà Nội cấp ngày 12/7/2018F
                    </p>

                </div>
                <div class="col-3">
                    <h4>ĐIỀU KHOẢN</h4>
                    <ul>
                        <li class="mb-3">
                            <a href="" class="nav-link">Điều khoản dịch vụ</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Điều khoản giao dịch</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Dịch vụ tiện ích</a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="nav-link">Dịch vụ trí tuệ</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
