@extends('admin.template.master')

@section('title', "Add Staff | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Tạo tài khoản mới")

@section('content')
<div id="register" class="form ">
    <div class="text-center">
        <img src="{{ asset('images/system/logo.png') }}" width="120" alt="logo" />
        <h1>NTN Store</h1>
    </div>
    <section class="login_content">
        <form action="" method="post" autocomplete="off">
            <div>
                <input type="text" class="form-control" placeholder="Phone" required="" />
            </div>
            <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Full name" required="" />
            </div>
            <div class="mb-3">
                <select name="gender" id="" class="form-control">
                    <option disabled selected>Gender</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Comfirm Password" required="" />
            </div>
            <div>
                <button class="btn btn-primary submit" type="submit">Tạo tài khoản</button>
            </div>

            <div class="clearfix"></div>

        </form>
    </section>
</div>
@stop