@extends('client.template.master')

@section('title', "Đăng nhập | NTN Shop")

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Đăng nhập
        </span>
    </div>
    <div class="d-flex justify-content-center align-items-center m-t-70 m-b-70">
        <form>
            <div class="wrap-login">
                <h4 class="mtext-109 cl2 p-b-30 txt-center">ĐĂNG NHẬP</h4>

                <div class="m-t-20">
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Email:</label>
                        <input type="text" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                    <div class="m-t-20">
                        <label class="stext-110 cl2">Mật khẩu:</label>
                        <input type="text" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                    </div>
                </div>
            </div>      
            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 m-t-30 hov-btn3 p-lr-15 trans-04 pointer ">
                Đăng nhập
            </button>      
            <hr />
            <a href="/home/register" class="flex-c-m stext-101 cl0 size-116 bg1 hov-btn3 m-t-30 p-lr-15 trans-04 pointer ">
                Đăng kí tài khoản
            </a>  
        </form>

    </div>
</div>



@stop