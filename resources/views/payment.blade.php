@extends('index')

@section ('title', 'Trang chủ')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h3>Cáo Bạc</h3>
            <div class="row">
                <div class="col-6">
                    <p style="font-size: 18px; font-weight: 500;">Thông tin nhận hàng</p>
                    <form action="">
                        <input type="text" name="" id="" placeholder="Họ và tên" class="form-control" required>
                        <input type="text" name="" id="" placeholder="Số điện thoại" class="mt-3 form-control"
                            required>
                        <input type="text" name="" id="" placeholder="Địa chỉ" class="mt-3 form-control" required>
                        <textarea placeholder="Ghi chú" class="mt-3 form-control" cols="30"></textarea>
                    </form>
                </div>

                <div class="col-6">
                    <p class="" style="font-size: 18px; font-weight: 500;">Vận chuyển</p>

                    <input type="text" placeholder="Phí vận chuyển: 25.000₫" class="mt-3 form-control" disabled>

                    <p class="mt-3 mb-1" style="font-size: 18px; font-weight: 500;">Thanh toán</p>
                    <select class="form-control" required>
                        <option value="" disabled selected>Chọn phương thức thanh toán</option>
                        <option value="1">Thanh toán khi nhận hàng (COD)</option>
                        <option value="2">Chuyển khoản</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4 border-start p-0">
            <div class="p-3 border border-end-0">
                <h4>Đơn hàng</h4>
            </div>

            <div class="d-flex p-2">
                <div class="m-2">
                    <div class=" justify-content-center align-items-center d-flex rounded overflow-auto bg-light border"
                        style="width: 60px; height: 60px;">
                        <img src="{{ asset('uploads/sp1.webp') }}" class="mw-100 mh-100">
                    </div>
                </div>
                <div class="m-2">
                    <h6>Lắc tay bạc Việt Nam kiềng cứng Mini Blink</h6>
                    <p class="" style="color: rgb(124, 124, 124); font-size: 15px;">693.000₫</p>
                </div>
            </div>

            <div class="d-flex p-2">
                <div class="m-2">
                    <div class=" justify-content-center align-items-center d-flex rounded overflow-auto bg-light border"
                        style="width: 60px; height: 60px;">
                        <img src="{{ asset('uploads/sp6.webp') }}" class="mw-100 mh-100">
                    </div>
                </div>
                <div class="m-2">
                    <h6>Vòng cổ mặt tròn (C153)</h6>
                    <p class="" style="color: rgb(124, 124, 124); font-size: 15px;">300.000₫</p>
                </div>
            </div>

            <hr>

            <div>
                <table class="table table-borderless">
                    <tr>
                        <td>Tạm tính:</td>
                        <td class="text-end">693.000₫</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển:</td>
                        <td class="text-end">25.000₫</td>
                    </tr>
                </table>
                <hr>

                <table class="table table-borderless">
                    <tr>
                        <td>Tổng thanh toán:</td>
                        <td class="text-end" style="font-size: 20px; font-weight: 600;">693.000₫</td>
                    </tr>

                    <tr>
                        <td><a href="{{route('cart')}}">Quay lại giỏ hàng</a></td>
                        <td class="text-end">
                            <button class="btn btn-primary">ĐẶT HÀNG</button>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection