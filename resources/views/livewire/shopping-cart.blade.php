<div class="wrap-header-cart js-panel-cart 
    {{$isShowModalCart ? 'show-header-cart' : ''}}"
>
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Giỏ hàng
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @if(count($products) == 0)
                <div>Không có sản phẩm nào</div>
                @endif
                @foreach($products as $product)
                <li class="header-cart-item flex-w flex-t m-b-12 align-items-center">
                    <div class="header-cart-item-img" wire:click="deleteProductCart({{$product->id}})">
                        <img src="{{asset('/images/products/' . $product->attributes->image)}}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="/home/product_detail/{{$product->id}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{$product->name}}
                        </a>

                        <span class="header-cart-item-info">
                            {{$product->quantity}} x {{number_format($product->price, 0, '.', ',')}} VND
                        </span>
                    </div>
                </li>
                @endforeach

            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Tổng cộng: {{number_format($total, 0, '.', ',')}} VND
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="/home/payment" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Xem giỏ hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
