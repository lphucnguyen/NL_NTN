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

    <title>Login | Admin NTN Shop</title>

    <!-- Bootstrap -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="https://colorlib.com/polygon/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom Theme Style -->
    <link href="https://colorlib.com/polygon/build/css/custom.min.css" rel="stylesheet">

</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <img src="{{ asset('images/system/logo.png') }}" width="130" class="img-fluid" alt="logo" />
                    </div>
                </div>
                <section class="login_content">
                    <form action="/admin/login" id="login_admin" method="post">
                        @csrf
                        <h1 class="text-capitalize">Đăng nhập</h1>

                        @if (session('error'))
                            <div class="row text-center">
                                <div class="col">
                                    <p class="text-danger">{{ session('error') }}</p>
                                </div>
                            </div>
                        @endif
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Phone, Email" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div>
                            <button class="btn submit" type="submit" from="login_admin">Đăng nhập</button>
                            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link d-inline">Bạn chưa có tài khoản?
                            <p class="d-inline to_register"> Nhờ admin tạo đi nhá </p>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
