@extends('index')

@section ('title', 'Giỏ hàng')

@section('content')

<div class="mt-3 container">
    <p style="font-size: 20px;">Giỏ hàng của bạn</p>

    <table class="table table-bordered text-center">
        <tr>
            <td>Ảnh</td>
            <td>Tên sản phẩm</td>
            <td>Đơn giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td>Xóa</td>
        </tr>

        <tr>
            <td style="width: 1px;">
                <div class="justify-content-center align-items-center bg-light rounded overflow-hidden d-flex border"
                    style="width: 150px; height: 150px;">
                    <img class="mh-100 mw-100" src="{{ asset('uploads/sp1.webp') }}">
                </div>
            </td>
            <td>
                Nhẫn nữ bạc Việt Nam Vanhein Ring (243)
            </td>
            <td style="color: #ffc107; font-weight: 600; font-size: 18px;">
                350.000₫
            </td>
            <td style="width: 200px;">
                <div class="col-sm-10 m-auto">
                    <div class="input-group" style="width: 100%;">
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
            </td>
            <td style="color: #ffc107; font-weight: 600; font-size: 18px;">
                350.000₫
            </td>
            <td>
                <i class="fa-solid fa-trash-can"></i>
            </td>
        </tr>
    </table>

    <div class="row mt-5 mb-3">
        <div class="col-6">
            <button class="btn btn-light text-black-50 link-light">Tiếp tục mua hàng</button>
        </div>
        <div class="col-6 text-end">
            <span>Tổng thanh toán: </span>
            <span style="color: #ffc107; font-weight: 600; font-size: 18px;">350.000đ</span>
        </div>
        <div class="col-6"></div>
        <div class="col-6 text-end">
            <div class="row">
                <a href="{{route('payment')}}"  class="btn btn-warning mb-3">Tiến hành thanh toán</a>
            </div>
        </div>
    </div>

</div>

@endsection