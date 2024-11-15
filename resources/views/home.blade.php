@extends('index')

@section('title', 'Trang chủ')

@section('content')

    <div class="mt-5 mb-5 container">

        <!-- Banner phụ -->
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('uploads/nhan1.jpg') }}" alt="" width="100%">
            </div>
            <div class="col-3">
                <img src="{{ asset('uploads/vongco1.jpg') }}" alt="" width="100%">
            </div>
            <div class="col-3">
                <img src="{{ asset('uploads/vongtay1.jpg') }}" alt="" width="100%">
            </div>
            <div class="col-3">
                <img src="{{ asset('uploads/lacchan1.jpg') }}" alt="" width="100%">
            </div>
        </div>
    </div>
    <!-- Best seller -->
    <div class="mt-5 text-center">
        <h2 class=" ">
            <a href="#" class="link-danger text-secondary text-decoration-none fw-bolder">BEST SELLER</a>
        </h2>
        <p class="fw-bolder text-secondery">Sản phẩm Bán Chạy Nhất - Số lượng giới hạn</p>
        <div class="bg-light">
            <div class="container p-5">

                <div class="mt-3 shadow bg-white">
                    <div class="row p-3">
                        <div class="col-8 pr-3 m-auto">
                            <div class="row">
                                <div class="col-5">
                                    <h5 class="text-uppercase"><a href="#" class="link-dark text-decoration-none">Lắc
                                            tay
                                            bạc QT040-063</a></h5>
                                    <div>
                                        <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                        <span class="text-decoration-line-through" class=" ml-2"
                                            style="font-size: 12px">17.000VND</span>
                                    </div>
                                    <button class="btn btn-danger bordered mt-2"><i class="fa-solid fa-cart-shopping"></i>
                                        Mua ngay</button>
                                </div>

                                <div class="col-7">
                                    <i class="" style="font-size: 12px;">
                                        Khuyên bạc Việt Nam chế tác thủ công theo tiêu chuẩn S925 quốc tế, đính đá CZ
                                        cao cấp.

                                        Mọi sản phẩm trang sức bạc tại Cáo Bạc đều được bảo hành và hỗ trợ sửa chữa trọn
                                        đời, trừ các lỗi biến dạng không thể khôi phục.
                                        <br>
                                        <span class="m-0">Thương hiệu: </span>
                                        <span class="fw-bolder">Đang cập nhật</span>
                                        <br>
                                        <span class="m-0"> Mã sản phẩm: </span>
                                        <span class="fw-bolder">QT040-063</span>
                                    </i>
                                </div>
                            </div>

                        </div>
                        <div class="col-4">
                            <img src="{{ asset('uploads/bestseller1.webp') }}" alt="" width="246px" height="339px">
                        </div>
                    </div>
                </div>

                <div class="mt-3 shadow bg-white">
                    <div class="row p-3">
                        <div class="col-8 pr-3 m-auto">
                            <div class="row">
                                <div class="col-5">
                                    <h5 class="text-uppercase"><a href=""
                                            class="link-dark text-decoration-none">KHUYÊN
                                            TAI BẠC VIỆT NAM HOA ĐÁ NĂM CÁNH</a></h5>
                                    <div>
                                        <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                        <span class="text-decoration-line-through" class=" ml-2"
                                            style="font-size: 12px">17.000VND</span>
                                    </div>
                                    <button class="btn btn-danger bordered mt-2"><i class="fa-solid fa-cart-shopping"></i>
                                        Mua
                                        ngay</button>
                                </div>

                                <div class="col-7">
                                    <i class="" style="font-size: 12px;">
                                        Khuyên bạc Việt Nam chế tác thủ công theo tiêu chuẩn S925 quốc tế, đính đá CZ
                                        cao cấp.

                                        Mọi sản phẩm trang sức bạc tại Cáo Bạc đều được bảo hành và hỗ trợ sửa chữa trọn
                                        đời, trừ các lỗi biến dạng không thể khôi phục.
                                        <br>
                                        <span class="m-0">Thương hiệu: </span>
                                        <span class="fw-bolder">Đang cập nhật</span>
                                        <br>
                                        <span class="m-0"> Mã sản phẩm: </span>
                                        <span class="fw-bolder">TT051-374</span>
                                    </i>


                                </div>
                            </div>

                        </div>
                        <div class="col-4">
                            <img src="{{ asset('uploads/bestseller2.webp') }}" alt="" width="246px" height="339px">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BỘ SƯU TẬP -->
    <div class="mt-5 text-center">
        <h2 class=" ">
            <a href="#" class="link-danger text-secondary fw-bolder text-uppercase text-decoration-none">bộ sưu
                tập
                mới</a>
        </h2>
        <div class="d-flex justify-content-center">
            <h6 class="me-3"><a class="text-decoration-none text-dark link-warning" href="#">Nhẫn</a></h6>
            <h6 class="me-3"><a class="text-decoration-none text-dark link-warning" href="#">Vòng cổ</a></h6>
            <h6><a class="text-decoration-none text-dark link-warning" href="#">Lắc chân</a></h6>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('uploads/bst 1.webp') }}" alt="" width="100%">
                    <div class="mt-3 mb-3">
                        <a href="" class="link-dark text-decoration-none">Nhẫn bạc Việt Nam xi vàng trắng 18k
                            đính kim
                            cương Moissanite 6li Circle</a>
                        <div class="">
                            <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                            <span class="text-decoration-line-through" class=" ml-2"
                                style="font-size: 12px">17.000VND</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('uploads/bst 2.webp') }}" alt="" width="255px" height="330px">
                            <div class="p-3">
                                <a href="chitietsanpham.html" class="link-warning text-dark text-decoration-none"
                                    style="font-size: 14px;">Nhẫn bạc Việt
                                    Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                                <div>
                                    <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                    <span class="text-decoration-line-through" class=" ml-2"
                                        style="font-size: 12px">17.000VND</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('uploads/bst 3.webp') }}" alt="" width="255px" height="330px">
                            <div class="p-3">
                                <a href="chitietsanpham.html" class="link-warning text-dark text-decoration-none"
                                    style="font-size: 14px;">Nhẫn bạc Việt
                                    Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                                <div>
                                    <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                    <span class="text-decoration-line-through" class=" ml-2"
                                        style="font-size: 12px">17.000VND</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('uploads/bst 4.webp') }}" alt="" width="255px" height="330px">
                            <div class="p-3">
                                <a href="chitietsanpham.html" class="link-warning text-dark text-decoration-none"
                                    style="font-size: 14px;">Nhẫn bạc Việt
                                    Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                                <div>
                                    <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                    <span class="text-decoration-line-through" class=" ml-2"
                                        style="font-size: 12px">17.000VND</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('uploads/bst 5.webp') }}" alt="" width="255px" height="330px">
                            <div class="p-3">
                                <a href="chitietsanpham.html" class="link-warning text-dark text-decoration-none"
                                    style="font-size: 14px;">Nhẫn bạc Việt
                                    Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                                <div>
                                    <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                                    <span class="text-decoration-line-through" class=" ml-2"
                                        style="font-size: 12px">17.000VND</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sản phẩm mới -->
    <div class="bg-light p-3 mb-3">
        <div class="container mt-5 mb-5 text-center">
            <h2 class=" ">
                <a href="#" class="link-danger text-secondary fw-bolder text-uppercase text-decoration-none">Sản
                    phẩm mới</a>
            </h2>
            <div class="row shadow p-3">
                @foreach ($products as $product)
                    <div class="col-3">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="255px"
                            height="330px">
                        <div class="p-3">
                            <a href="{{ url('/detail/' . $product->id) }}"
                                class="link-warning text-dark text-decoration-none"
                                style="font-size: 14px;">{{ $product->name }}</a>
                            <div>
                                <span class="fs-5 fw-bold text-danger">{{ number_format($product->price) }} VND</span>
                                <span class="text-decoration-line-through" style="font-size: 12px">17.000 VND</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

    </div>



    <!-- BANNER PHU -->
    <div class="row g-0">
        <div class="col-6 bannerphu text-end">
            <h5 class="text-white m-5">Giới thiệu Cáo Bạc</h5>
            <h1 class="m-5" style="font-size: 60px;"><a href="#"
                    class="link-light text-warning text-decoration-none">"Every
                    Piece Of Our Jewelry Tells A Story"</a>
            </h1>
            <a href="" class="text-light link-warning text-decoration-none m-5">______ XEM SHOP</a>
        </div>
        <div class="col-6">
            <img src="{{ asset('uploads/banner 5.webp') }}" alt="" width="100%">
        </div>
    </div>

    <!-- Tin tức -->
    <div class="text-center container mb-5">
        <h2 class="mt-5">
            <a href="#" class="link-danger text-secondary fw-bolder text-uppercase text-decoration-none">tin
                tức</a>
        </h2>
        <p class="fw-bolder text-secondery">Cập nhật tin tức mới nhất về Cáo Bạc</p>
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('uploads/tintuc1.webp') }}" alt="" width="100%">
                <h6 class="fw-bolder mt-3"><a href="#" class="text-dark link-warning text-decoration-none">[GRAND
                        OPENING] MỪNG KHAI TRƯƠNG STORE CÁO BẠC HẢI PHỎNG - TẶNG BẠN NGÀN ƯU ĐÃI HẤP DẪN</a></h6>
                <p>Cả nhà ơi, nhân dịp mừng khai trương store mới của Cáo Bạc Hải Phòng, chúng mình đem tới vô vàn quà
                    tặng cực hấp dẫn trong ngày khai trương và suốt tháng khai trương. Mời mọi người ghé thăm Cáo Bạc để
                    nhận quà:</p>
            </div>
            <div class="col-4">
                <img src="{{ asset('uploads/tintuc2.webp') }}" alt="" width="100%">
                <h6 class="fw-bolder mt-3"><a href="#" class="text-dark link-warning text-decoration-none">[GRAND
                        OPENING] MỪNG KHAI TRƯƠNG STORE CÁO BẠC HẢI PHỎNG - TẶNG BẠN NGÀN ƯU ĐÃI HẤP DẪN</a></h6>
                <p>Cả nhà ơi, nhân dịp mừng khai trương store mới của Cáo Bạc Hải Phòng, chúng mình đem tới vô vàn quà
                    tặng cực hấp dẫn trong ngày khai trương và suốt tháng khai trương. Mời mọi người ghé thăm Cáo Bạc để
                    nhận quà:</p>
            </div>
            <div class="col-4">
                <img src="{{ asset('uploads/tintuc3.webp') }}" alt="" width="100%">
                <h6 class="fw-bolder mt-3"><a href="#" class="text-dark link-warning text-decoration-none">[GRAND
                        OPENING] MỪNG KHAI TRƯƠNG STORE CÁO BẠC HẢI PHỎNG - TẶNG BẠN NGÀN ƯU ĐÃI HẤP DẪN</a></h6>
                <p>Cả nhà ơi, nhân dịp mừng khai trương store mới của Cáo Bạc Hải Phòng, chúng mình đem tới vô vàn quà
                    tặng cực hấp dẫn trong ngày khai trương và suốt tháng khai trương. Mời mọi người ghé thăm Cáo Bạc để
                    nhận quà:</p>
            </div>
        </div>
    </div>


@endsection
