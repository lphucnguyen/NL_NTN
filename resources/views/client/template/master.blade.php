<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('images/system/logo.png') }}" type="image/x-icon">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client_template/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://preview.colorlib.com/theme/cozastore/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="https://preview.colorlib.com/theme/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client_template/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client_template/css/main.css') }}">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >

    @livewireStyles
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="/home" class="logo text-dark">
                        <img src="{{ asset('images/system/logo.png') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="list-menu">
                                <a href="/home">Trang Chủ</a>
                            </li>

                            <li class="list-menu">
                                <a href="/home/shop">Cửa Hàng</a>
                            </li>

                            <li class="list-menu">
                                <a href="/home/payment">Giỏ Hàng</a>
                            </li>

                            <li class="list-menu">
                                <a href="/home/about">Giới thiệu</a>
                            </li>

                            {{-- <li class="list-menu">
                                <a href="/home/contact">Liên Hệ</a>
                            </li> --}}
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                            data-notify={{ count(Cart::getContent()) }}>
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        @if (!Auth::check())
                            <a href="/home/login" class="cl2 hov-cl1 trans-04 p-l-22 p-r-11h">
                                Đăng nhập
                            </a>
                            <span class="m-r-5 m-l-5"> / </span>
                            <a href="/home/register" class="cl2 hov-cl1 trans-04">
                                Đăng kí
                            </a>
                        @else
                            <a href="/home/profile" class="cl2 hov-cl1 trans-04 p-l-22 p-r-11h">
                                Hồ sơ
                            </a>
                            <span class="m-r-5 m-l-5"> / </span>
                            <a href="/home/logout" class="cl2 hov-cl1 trans-04">
                                Đăng xuất
                            </a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('client/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                    data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li class="list-menu">
                    <a href="/home">Home</a>
                </li>

                <li class="list-menu">
                    <a href="/home/shop">Shop</a>
                </li>

                <li class="list-menu">
                    <a href="/home/payment">Features</a>
                </li>

                <li class="list-menu">
                    <a href="/home/blog">Blog</a>
                </li>

                <li class="list-menu">
                    <a href="/home/about">About</a>
                </li>

                <li class="list-menu">
                    <a href="/home/contact">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            @livewire('search-bar')
        </div>
    </header>

    @livewire('shopping-cart')

    @livewire('modal-product-preview')

    @yield('content')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Danh mục
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="/home" class="stext-107 cl7 hov-cl1 trans-04">
                                Trang Chủ
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="/home/shop" class="stext-107 cl7 hov-cl1 trans-04">
                                Cửa Hàng
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="/home/payment" class="stext-107 cl7 hov-cl1 trans-04">
                                Giỏ Hàng
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Hệ thống
                    </h4>

                    <ul>

                        <li class="p-b-10">
                            <a href="/home/register" class="stext-107 cl7 hov-cl1 trans-04">
                                Đăng kí
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="/home/login" class="stext-107 cl7 hov-cl1 trans-04">
                                Đăng nhập
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Liên hệ
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <p href="/home" class="stext-107 cl7 hov-cl1 trans-04">
                                Giám đốc: Nguyễn Thị Tú Như
                            </p>
                        </li>
                        <li class="p-b-10">
                            <p href="/home" class="stext-107 cl7 hov-cl1 trans-04">
                                Phó Giám Đốc: Đỗ Ngọc Hoài Thương
                            </p>
                        </li>
                        <li class="p-b-10">
                            <p href="/home" class="stext-107 cl7 hov-cl1 trans-04">
                                Nhân viên: Lê Phúc Nguyên
                            </p>
                        </li>

                    </ul>

                    {{-- <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div> --}}
                </div>

                {{-- <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>

            {{-- <div class="p-t-40">

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved |Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div> --}}
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/bootstrap/js/popper.js"></script>
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/daterangepicker/moment.min.js"></script>
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/slick/slick.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        // $('.js-addcart-detail').each(function() {
        //     var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        //     $(this).on('click', function() {
        //         swal(nameProduct, "is added to cart !", "success");
        //     });
        // });

        window.addEventListener('swal', event => {
            // alert('Name updated to: ' + event.detail.newName);
            if (event.detail.returnURL) {
                const {returnURL} = event.detail;

                swal(event.detail.title, event.detail.text, event.detail.icon)
                    .then(() => {
                        window.location = returnURL;
                    });

                return;
            }

            swal(event.detail.title, event.detail.text, event.detail.icon);
        });

        window.addEventListener('productAdded', event => {
            const {
                total
            } = event.detail;
            const iconNoti = document.querySelector('.icon-header-noti');

            iconNoti.setAttribute("data-notify", total);
        });
    </script>
    <!--===============================================================================================-->
    <script src="https://preview.colorlib.com/theme/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    @livewireScripts
    <!--===============================================================================================-->
    <script src="{{ asset('client_template/js/main.js') }}"></script>
    <script src="{{ asset('client_template/js/my-custom.js') }}"></script>

    <script src="{{ asset('client_template/js/slick-custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
