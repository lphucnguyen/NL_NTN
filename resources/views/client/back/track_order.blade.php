@extends('client.template.master')

@section('title', "Kiểm tra hóa đơn | NTN Shop")

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ hàng
        </span>
    </div>
</div>

<form wire:submit.prevent="changeQuantityProduct(Object.fromEntries(new FormData($event.target)))" method="POST" class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">

                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Gía</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Tổng cộng</th>
                            </tr>

                            @if(count($products) == 0)
                            <tr class="table_head">
                                <td colspan="5" class="txt-center d-block pt-3 pb-3 w-100">Không có sản phẩm</td>
                            </tr>
                            @endif

                            @foreach($products as $key => $product)

                            <tr class="table_row">
                                <td class="column-1">
                                    <div>
                                        <img src="{{asset('/images/products/' . $product->attributes->image)}}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    <a href="/home/product_detail/{{$product->id}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{$product->name}}
                                    </a>
                                </td>
                                <td class="column-3">{{number_format($product->price, 3, '.', ',')}} VND</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input 
                                            class="mtext-104 cl3 txt-center num-product"
                                            type="number"
                                            name={{$product->id}}
                                            value={{$product->quantity}}
                                        >

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <input 
                                        class="mtext-104 cl3 txt-center num-product"
                                        type="hidden"
                                        value={{$product->id}}
                                    >
                                </td>
                                <td class="column-5">{{number_format($product->price * $product->quantity, 3, '.', ',')}} VND</td>
                            </tr>

                            @endforeach
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Tổng giỏ hàng
                    </h4>

                    @foreach($products as $product)

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208 text-left">
                            <span class="stext-110 cl2">
                                {{$product->name}} x {{$product->quantity}}
                            </span>
                        </div>

                        <div class="size-209 text-right">
                            <span class="mtext-110 cl2">
                                {{number_format($product->price * $product->quantity, 3, ',', '.')}} VND
                            </span>
                        </div>
                    </div>

                    @endforeach

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208 text-left">
                            <span class="mtext-101 cl2">
                                Tổng cộng:
                            </span>
                        </div>

                        <div class="size-209 p-t-1 text-right">
                            <span class="mtext-110 cl2">
                                {{number_format($total, 3, ',', '.')}} VND
                            </span>
                        </div>
                    </div>

                    <a href="/home/checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Tiến hành thanh toán
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@stop
