
<div>
    <div class="flex-c p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <button
            wire:click="load('all')"
            class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{$type == 'all' ? 'how-active1' : ''}}"
            data-filter="*">
                Tất cả sản phẩm
            </button>

            <button wire:click="load('new')"
            class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{$type == 'new' ? 'how-active1' : ''}}"
            data-filter=".women">
                Sản phẩm mới
            </button>

        </div>

    </div>

    <div class="row">
        @foreach($products as $product)

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{asset(count($product->images) > 0 ? '/images/products/' . $product->images[0]->name : 'client_template/images/product-1.png')}}" alt="IMG-PRODUCT">
                    {{-- {{print_r($product->images)}} --}}
                    {{-- <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT"> --}}
                    <button
                        {{-- href="#" --}}
                        type="button"
                        wire:click="$emit('viewProduct', {{ $product->id }})"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                        {{-- data-target="#previewProduct" --}}
                    >
                        Xem nhanh
                    </button>
                </div>

                <div class="block2-txt flex-w flex-c p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/home/product_detail/{{$product->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
                            {{ number_format($product->price, 0, '.', ',') }} VND
                        </span>
                    </div>

                    {{-- <div class="block2-txt-child2 flex-r p-t-15 p-r-10">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <i class="fa fa-shopping-cart fs-20"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

        @endforeach


    </div>

    <div wire:loading wire:target="loadMore" class="text-center">
        Loading...
    </div>
    <!-- Load more -->
    @if(!$isNoLoadMore)
    <div class="flex-c-m flex-w w-full p-t-45">
        <button type="button" wire:click='loadMore' class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Hiển thị thêm
        </button>
    </div>
    @endif

</div>

