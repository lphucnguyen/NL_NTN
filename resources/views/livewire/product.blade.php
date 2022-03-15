@foreach($products as $product)

<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{asset($product['image'])}}" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-c p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $product['title'] }}
                </a>

                <span class="stext-105 cl3">
                    {{ $product['price'] }}
                </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-15 p-r-10">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <i class="fa fa-shopping-cart fs-20"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endforeach