@extends('client.template.master')

@section('title', "Đăng kí | NTN Shop")

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Đăng kí
        </span>
    </div>
    <div class="d-flex justify-content-center align-items-center m-t-70 m-b-70">
        <form method="POST" action={{ route('submitRegister') }}>
            @csrf
            <div class="wrap-login">
                <h4 class="mtext-109 cl2 p-b-30 txt-center">ĐĂNG KÍ</h4>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="m-t-20">
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Họ tên:</label>
                        <input type="text" name="fullname" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Email:</label>
                        <input type="text" name="email" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Số điện thoại:</label>
                        <input type="text" name="phone" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Địa chỉ:</label>
                        <input type="text" name="address" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Giới tính:</label>
                        <select type="text" name="gender" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight">
                            <option value="Name">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Mật khẩu:</label>
                        <input type="password" name="password" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Nhập lại mật khẩu:</label>
                        <input type="password" name="password_confirmation" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    
                </div>
            </div>      
            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 m-t-30 hov-btn3 p-lr-15 trans-04 pointer">
                Đăng kí
            </button>  
            <hr />
            <a href="/home/login" class="flex-c-m stext-101 cl0 size-116 bg1 hov-btn3 m-t-30 p-lr-15 trans-04 pointer ">
                Đăng nhập
            </a>      
        </form>

    </div>
</div>



@stop