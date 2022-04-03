<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <h4 class="mtext-109 cl2 p-b-30">THÔNG TIN KHÁCH HÀNG</h4>
                    
                    <div class="wrap-table-shopping-cart m-t-20" style="border: none;">
                        <div class="m-t-20">
                            <label class="stext-110 cl2">Họ tên:</label>
                            <input type="text" disabled value={{Auth::user()->fullname}} class="mtext-107 clblack p-l-20 p-r-20 size-114 plh2 bglight" />
                        </div>
                        <div class="m-t-20">
                            <label class="stext-110 cl2">Số điện thoại:</label>
                            <input type="text" disabled value={{Auth::user()->phone}} class="mtext-107 clblack p-l-20 p-r-20 size-114 plh2 bglight" />
                        </div>
                        <div class="m-t-20">
                            <label class="stext-110 cl2">Địa chỉ:</label>
                            <input type="text" wire:model="address" value={{Auth::user()->address}} class="mtext-107 clblack p-l-20 p-r-20 size-114 plh2 bglight" />
                        </div>
                        <div class="m-t-20">
                            <label class="stext-110 cl2">Ghi chú:</label>
                            <textarea wire:model="note" class="mtext-107 clblack p-l-20 p-r-20 p-t-20 p-b-20 size-w-114 plh2 bglight"></textarea>
                        </div>
                        <div class="m-t-20">
                            <label class="stext-110 cl2">Hình thức thanh toán:</label>
                            <div>
                                <input type="radio" id='checkout-1' wire:model="payment" name="payment" value="Thanh toán khi nhận hàng" class="d-inline mtext-107 clblack p-l-20 p-r-20 plh2 bglight" />
                                <label class="d-inline" for="checkout-1">Thanh toán khi nhận hàng</label>
                            </div>
                            <div>
                                <input type="radio" id='checkout-2' wire:model="payment" name="payment" value="MoMo" class="d-inline mtext-107 clblack p-l-20 p-r-20 plh2 bglight" />
                                <label class="d-inline" for="checkout-2">MoMo</label>
                            </div>
                            <div>
                                <input type="radio" id='checkout-3' wire:model="payment" name="payment" value="VNPay" class="d-inline mtext-107 clblack p-l-20 p-r-20 plh2 bglight" />
                                <label class="d-inline" for="checkout-3">VNPay</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Tổng hóa đơn
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
                                {{number_format($product->price * $product->quantity, 0, ',', '.')}} VND
                            </span>
                        </div>
                    </div>

                    @endforeach

                    @if($coupon['percent'] > 0)
                    <div class="flex-w flex-t bor12 p-b-13 p-t-13">
                        <div class="size-208 text-left">
                            <span class="stext-110 cl2">
                                Khuyến mãi:
                            </span>
                        </div>

                        <div class="size-209 text-right">
                            <span class="mtext-110 cl2">
                                -{{$coupon['percent']}}% ({{$coupon['code']}})
                            </span>
                        </div>
                    </div>
                    @endif

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
                                {{number_format($total, 0, ',', '.')}} VND
                            </span>
                        </div>
                    </div>

                    <button wire:click="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Thanh Toán
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
