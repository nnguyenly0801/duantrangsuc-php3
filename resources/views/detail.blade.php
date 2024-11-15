@extends('index')

@section('title', 'Chi tiết sản phẩm')

@section('content')

    <div class="mt-5 mb-5 container-sm">
        <!-- Chi tiết sản phẩm -->
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <div class="justify-content-center align-items-center d-flex rounded overflow-auto"
                    style="width: 100%; height: 100%;">
                    <img src="{{ $product->image }}" class="mw-100 mh-100">
                </div>
            </div>
            <div class="col-6">

                <!-- Chi tiết -->
                <h1 class="text-uppercase" style="font-size: 24px;">{{ $product->name }}</h1>
                <p class="" style="color: #dac09f; font-size: xx-large; font-weight: 800;">{{ $product->price }}</p>
                <hr>
                <p>
                    {{ $product->description }}
                </p>
                <p>
                    Mọi sản phẩm trang sức bạc tại Cáo Bạc đều được bảo hành và hỗ trợ sửa chữa trọn đời,
                    trừ các lỗi biến dạng không thể khôi phục.
                </p>
                <span class="m-0">Thương hiệu: </span>
                <span class="fw-bolder">Đang cập nhật</span>
                <br>
                <span class="m-0"> Mã sản phẩm: </span>
                <span class="fw-bolder">QT040-063</span>

                <!-- Số lượng -->
                <div class="col-sm-10 mt-3">
                    <div class="input-group" style="width: 30%;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="document.getElementById('quantity').stepDown()">-</button>
                        </div>
                        <input type="number" class="form-control rounded" style="margin: 0 10px;" id="quantity"
                            value="1" min="1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="document.getElementById('quantity').stepUp()">+</button>
                        </div>
                    </div>
                </div>

                <!-- Button -->

                <button class="btn btn-warning mt-3 text-uppercase" style="width: 60%; height: 10%; font-size: 20px;">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="{{ route('cart') }}" class="link-light text-decoration-none text-dark">Thêm vào giỏ hàng</a>
                </button>
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="mt-5">
            <p class="text-center text-uppercase text-decoration-underline mb-5"
                style="font-weight:700; color: #dac09f; font-size: 20px;">Thông tin sản phẩm</p>

            <p>Nhẫn nữ bạc Việt Nam chế tác thủ công theo tiêu chuẩn S925 quốc tế, đính đá CZ cao cấp.</p>
            <p>Cáo Bạc bảo hành trọn đời với các lỗi: xỉn màu, đứt gãy, rơi đá, móp méo (trong trường hợp có thể khôi
                phục) có phụ phí.
                Quý khách vui lòng giữ hóa đơn hoặc thông báo thông tin mua hàng chính xác để được hỗ trợ bảo hành.
                Thời gian bảo hành, sửa chữa là 7-10 ngày tùy thuộc vào tình trạng của sản phẩm.</p>
            <p>Mẫu trang sức bạc được chế tác tỉ mỉ nhất Cáo Bạc là sản phẩm Nhẫn nữ bạc ta sáng bóng, bền màu đi kèm
                mặt dây nhỏ nhắn, xinh yêu.
                Sản phẩm có túi hộp đựng sang trọng, phù hợp làm quà tặng</p>
            <p>Cáo Bạc là thương hiệu trang sức vàng bạc được thành lập vào tháng 9 năm 2014.
                Dòng sản phẩm chủ yếu là trang sức vàng tây, trang sức bạc ta làm thủ công tại xưởng Việt Nam và trang
                sức bạc Thái nhập khẩu trực tiếp từ Thái Lan.
                Cáo Bạc luôn cố gắng đem đến các sản phẩm chất lượng cao, giá cả cạnh tranh cùng chế độ bảo hành, chăm
                sóc khách hàng chu đáo.
                Cs1: Số 1, ngõ 121 Chùa Láng, Đống Đa, Hà Nội. Hotline: 0382496087.
                Cs2: 52 Lê Lợi, Hải Phòng. Hotline: 07723776493.
                Cs3: Số 57 Nguyễn Văn Cừ, TP Vinh. Hotline: 0966863457.</p>
        </div>

        {{-- Bình luận --}}
        <p class="text-center text-uppercase text-decoration-underline mb-5"
            style="font-weight:700; color: #dac09f; font-size: 20px;">Bình luận sản phẩm</p>
        <!-- Hiển thị bình luận hiện có -->
        <h3>Bình luận về sản phẩm:</h3>
        <ul>
            @foreach ($comments as $comment)
                <li class="border rounded p-2">
                    <strong>{{ $comment->user_name ? $comment->user_name : 'Người dùng ẩn danh' }}</strong>:
                    <p>{{ $comment->comment }}</p>
                    <small>Đã bình luận vào: {{ $comment->created_at }}</small>
                </li>
            @endforeach
        </ul>

        <!-- Form thêm bình luận -->
        @if (Auth::check())
            <form action="{{ url('/products/' . $product->id . '/comments') }}" method="POST">
                @csrf
                <textarea name="comment" rows="4" placeholder="Nhập bình luận của bạn" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
            </form>
        @else
            <p>Bạn phải <a href="{{ route('login') }}">đăng nhập</a> để có thể bình luận.</p>
        @endif

        <!-- SẢN PHẨM TƯƠNG TỰ -->
        <div class="row">
            <div class="col-3">
                <div class="shadow">
                    <div class="justify-content-center align-items-center rounded d-flex overflow-auto mt-3 m-auto"
                        style="height: 70%; width: 70%;">
                        <img src="{{ asset('uploads/sp1.webp') }}" class="mw-100 mh-100">
                    </div>
                    <div class="p-3">
                        <a href="#" class="link-dark text-decoration-none" style="font-size: 14px;">Nhẫn bạc Việt
                            Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                        <div>
                            <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                            <span class="text-decoration-line-through" class=" ml-2"
                                style="font-size: 12px">17.000VND</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="shadow">
                    <div class="justify-content-center align-items-center rounded d-flex overflow-auto mt-3 m-auto"
                        style="height: 70%; width: 70%;">
                        <img src="{{ asset('uploads/sp4.webp') }}" class="mw-100 mh-100">
                    </div>
                    <div class="p-3">
                        <a href="#" class="link-dark text-decoration-none" style="font-size: 14px;">Nhẫn bạc Việt
                            Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                        <div>
                            <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                            <span class="text-decoration-line-through" class=" ml-2"
                                style="font-size: 12px">17.000VND</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="shadow">
                    <div class="justify-content-center align-items-center rounded d-flex overflow-auto mt-3 m-auto"
                        style="height: 70%; width: 70%;">
                        <img src="{{ asset('uploads/sp3.webp') }}" class="mw-100 mh-100">
                    </div>
                    <div class="p-3">
                        <a href="#" class="link-dark text-decoration-none" style="font-size: 14px;">Nhẫn bạc Việt
                            Nam xi vàng trắng 18k đính kim cương Moissanite 6li Circle</a>
                        <div>
                            <span class="fs-5 fw-bold text-danger">10.000 VND </span>
                            <span class="text-decoration-line-through" class=" ml-2"
                                style="font-size: 12px">17.000VND</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="shadow">
                    <div class="justify-content-center align-items-center rounded d-flex overflow-auto mt-3 m-auto"
                        style="height: 70%; width: 70%;">
                        <img src="{{ asset('uploads/sp2.webp') }}" class="mw-100 mh-100">
                    </div>
                    <div class="p-3">
                        <a href="#" class="link-dark text-decoration-none" style="font-size: 14px;">Nhẫn bạc Việt
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

        <div class="text-center">
            <button class="btn btn-dark mt-4" style="width: 30%;">Xem thêm</button>
        </div>
    </div>
@endsection
