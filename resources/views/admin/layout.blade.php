<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>

    <!-- 1. Nhúng thư viện bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 2. Nhúng thư viện font icon -->
    <script src="https://kit.fontawesome.com/41dd1b16b5.js"></script>

    <link rel="stylesheet" href="../../css/app.css">

</head>

<body>


    <!--2. Nội dung-->
    <div class="d-flex">
        <!--2.1: Sidebar-->
        <div class="sidebar">
            <div class="border-end p-2" style="width: 250px; min-height: calc(100vh);">

                <a href="{{ route('admin.index') }}" class="text-center fw-semibold text-uppercase m-3">
                    <h4>Cáo bạc</h4>
                </a>
                <a href="{{ route('home') }}" class="text-center fw-semibold text-uppercase m-3">
                    <p>Quay lại trang chủ</p>
                </a>
                <hr>

                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link link-dark border-bottom mt-3" href="{{ route('admin.products.list') }}">Danh
                            sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark border-bottom mt-3"
                            href="{{ route('admin.categories.list') }}">Danh sách
                            danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark border-bottom mt-3" href="danhsachdh.html">Danh sách
                            đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark border-bottom mt-3" href="{{ route('admin.users.list') }}">Danh
                            sách
                            User</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link-dark border-bottom mt-3" href="{{ route('admin.comments.list') }}">Danh
                            sách Comments</a>
                    </li>
                </ul>
            </div>
        </div>


        <!--2.2: Nội dung chính-->
        <div class="" style="width: calc(100% - 250px);">
            <!-- Thiết kế NAVBAR: Có logo và thông tin đăng nhập-->
            <nav class="navbar navbar-expand-sm bg-dark shadow">

                <div class="container-fluid">
                    <!-- Hiển thị logo -->
                    {{-- <ul class="navbar-nav">
                        <li class="nav-item">
                          <img src="../../../storage/app/public/images/logo.webp"height="40px">
                        </li>
                    </ul> --}}

                    <!-- Hiển thị thông tin đăng nhập -->
                    <ul class="navbar-nav">
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Xin chào {{ Auth::user()->fullname }}</a>
                                <a href="{{ route('logout') }}" class="btn btn-danger mb-5 btn-sm">Đăng xuất</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-light">Đăng nhập</a>
                            </li>
                        @endif
                    </ul>
                </div>

            </nav>

            <div class="container mt-3">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
