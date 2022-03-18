@extends('client.template.master')

@section('title', "Home | NTN Shop")

@section('content')


<!-- Banner -->
{{-- <div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{asset('client_template/images/banner-01.jpg')}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Women
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{asset('client_template/images/banner-02.jpg')}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Men
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{asset('client_template/images/banner-03.jpg')}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Accessories
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                New Trend
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 text-center cl5">
                Sản phẩm cửa hàng
            </h3>
        </div>

        <div class="flex-c p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                    Sản phẩm mới
                </button>

            </div>

        </div>


        {{-- List product --}}
        <div class="row isotope-grid">

            @livewire('products')

            {{-- <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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


            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
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

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('client_template/images/product-03.jpg')}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-c p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/home/pruduct_detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                Only Check Trouser
                            </a>

                            <span class="stext-105 cl3">
                                $25.50
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-15 p-r-10">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <i class="fa fa-shopping-cart fs-20"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Hiển thị thêm
            </a>
        </div>
    </div>
</section>
@stop