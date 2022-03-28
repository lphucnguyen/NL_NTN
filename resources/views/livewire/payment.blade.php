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
                                    <div wire:click="$emit('deleteProductCart', {{$product->id}})" class="how-itemcart1">
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

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input wire:model="coupon" class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" placeholder="Coupon Code">

                            <div wire:click="addCoupon" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Áp dụng Coupon
                            </div>
                        </div>

                        <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Cập nhật giỏ hàng
                        </button>
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

                    {{-- <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208 text-left">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209 text-right">
                            <span class="mtext-110 cl2">
                                {{number_format($subTotal, 3, ',', '.')}} VND
                            </span>
                        </div>
                    </div> --}}

                    {{-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                            </p>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                </div>

                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}

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