<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/system/logo.png') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="https://colorlib.com/polygon/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="https://colorlib.com/polygon/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="https://colorlib.com/polygon/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="https://colorlib.com/polygon/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="https://colorlib.com/polygon/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="https://colorlib.com/polygon/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="https://colorlib.com/polygon/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
        rel="stylesheet">
    <link href="https://colorlib.com/polygon/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
        rel="stylesheet">
    <link href="https://colorlib.com/polygon/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
        rel="stylesheet">
    <link href="https://colorlib.com/polygon/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
        rel="stylesheet">
    <link href="https://colorlib.com/polygon/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Custom Theme Style -->
    <link href="https://colorlib.com/polygon/build/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <!-- Jquery 3.6 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        table tbody tr td {
            vertical-align: middle !important;
        }

    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/admin" class="site_title">
                            <img src="{{ asset('images/system/logo.png') }}" class="bg-light rounded-circle" width="40"
                                alt="logo" />
                            <span>𝓝𝓣𝓝 𝓢𝓽𝓸𝓻𝓮</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}" alt="..."
                                class="img-circle profile_img" width="90">
                        </div>
                        <div class="profile_info">
                            <span>Xin chào,</span>

                            <h2>{{ Auth::user()->fullname }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Quản lí cửa hàng</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-cubes"></i> Sản phẩm <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/product">Danh sách sản phẩm</a></li>
                                        <li><a href="/admin/addproduct/list">Thêm nhiều sản phẩm</a></li>
                                        <li><a href="/admin/product_type">Dánh sách loại sản phẩm</a></li>
                                        @if (Auth::id() == 1)
                                            <li><a href="{{ route('admin.product.deletelist') }}">Dánh sách sản phẩm
                                                    đã xóa</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-user"></i> Nhân viên <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/staff">Danh sách nhân viên</a></li>
                                        @if (Auth::id() == 1)
                                            <li><a href="/admin/addstaff">Tạo tài khoản</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-files-o"></i> Đơn hàng <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/order">Danh sách đơn hàng</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-money"></i> Khuyến mãi <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/promotion">Danh sách mã khuyến mãi</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-bar-chart-o"></i> Thống kê <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/statistical">Thống kê đơn hàng</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}" --}} alt=""
                                        class="img-circle">{{ Auth::user()->fullname }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right mt-3"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin/profile/{{ Auth::id() }}">
                                        Profile</a>
                                    <a class="dropdown-item" href="/admin/logout"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col rounded" role="main" id="page_content">
                @yield('statistical')
                <div class="">

                    <div class="row rounded" style="display: block;">
                        <div class="col-12">
                            <div class="x_panel" style="border-radius: 20px">
                                <div class="x_title">
                                    <h2><b> @yield('x_heading') </b></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    @if (session('notify_success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('notify_success') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    @if (session('notify_fail'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('notify_fail') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    {{-- CONTENT --}}
                                    @yield('content')
                                    {{-- /CONTENT --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->


            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Copyright &copy; 2022 <a href="#NTN_SHOP">NTN STORE</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://colorlib.com/polygon/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://colorlib.com/polygon/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="https://colorlib.com/polygon/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="https://colorlib.com/polygon/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="https://colorlib.com/polygon/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="https://colorlib.com/polygon/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="https://colorlib.com/polygon/vendors/moment/min/moment.min.js"></script>
    <script src="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="https://colorlib.com/polygon/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="https://colorlib.com/polygon/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="https://colorlib.com/polygon/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="https://colorlib.com/polygon/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="https://colorlib.com/polygon/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="https://colorlib.com/polygon/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="https://colorlib.com/polygon/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="https://colorlib.com/polygon/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="https://colorlib.com/polygon/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="https://colorlib.com/polygon/vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="{{ asset('admin_template/vendors/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="https://colorlib.com/polygon/vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
    <script src="https://colorlib.com/polygon/vendors/jszip/dist/jszip.min.js"></script>
    <script src="https://colorlib.com/polygon/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="https://colorlib.com/polygon/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- JQVMap -->
    <script src="https://colorlib.com/polygon/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="https://colorlib.com/polygon/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="https://colorlib.com/polygon/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- Skycons -->
    <script src="https://colorlib.com/polygon/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.js"></script>
    <script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.time.js"></script>
    <script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="https://colorlib.com/polygon/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="https://colorlib.com/polygon/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="https://colorlib.com/polygon/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="https://colorlib.com/polygon/vendors/DateJS/build/date.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin_template/build/js/custom.js') }}"></script>

</body>

</html>
