<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src={{count($product->images) > 0 ? $product->images[0]->name : ''}} alt="IMG-PRODUCT">

            <button wire:click="$emit('viewProduct', {{ $product->id }})" type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Xem Nhanh
            </button>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{$product->name}}
                </a>

                <span class="stext-105 cl3">
                    {{number_format($product->price, 0, ',', '.')}}
                </span>
            </div>

            {{-- <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                </a>
            </div> --}}
        </div>
    </div>
</div>