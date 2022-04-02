<div class="wrap-modal1 js-modal1 p-t-60 p-b-20 {{ $isShowModalPreviewProduct ? 'show-modal1' : '' }}">
    <div class="overlay-modal1 js-hide-modal1"></div>

    @if(!is_null($productQuickView))
    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button wire:click="closeModal" class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="/client_template/images/icons/icon-close.png" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach($productQuickView->images as $image)
                                <div class="item-slick3" data-thumb={{asset('/images/products/' . $image->name)}}>
                                    <div class="wrap-pic-w pos-relative">
                                        <img src={{asset('/images/products/' . $image->name)}} alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href={{asset('/images/products/' . $image->name)}}>
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $productQuickView->name}}
                        </h4>

                        <span class="mtext-106 cl2">
                            {{number_format($productQuickView->price, 0, '.', ',') }} VND
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{substr($productQuickView->description, 0, 200)}}
                        </p>
                        
                        <!--  -->
                        <div class="p-t-33">
                            <p class="stext-102 cl3 p-t-23">
                                Số lượng: {{ $productQuickView->quantity}}
                            </p>
                            <form wire:submit.prevent="addToCart" class="flex-w p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div wire:click="subQty" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input
                                            class="mtext-104 cl3 txt-center num-product"
                                            type="number"
                                            wire:model="qtyProductAdd"
                                        >
                                        <input
                                            class="mtext-104 cl3 txt-center num-product"
                                            type="hidden"
                                            wire:model="idProductAdd"
                                        >

                                        <div wire:click="addQty" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        type="submit"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                    >
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>                                        
                            </form>	
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>