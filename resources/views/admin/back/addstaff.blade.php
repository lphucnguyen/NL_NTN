@extends('admin.template.master')

@section('title', "Add Staff | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Tạo tài khoản mới")

@section('content')
<div id="register" class="form ">
    <div class="text-center">
        <img src="{{ asset('images/system/logo.png') }}" width="280" alt="logo" />
    </div>

    @if (session('notify_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('notify_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('notify_fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('notify_fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <section class="login_content">
        <form action="" id="frmAddStaff" class="form-horizontal form-label-left" method="post" autocomplete="off">
            @csrf

            <div>
                <input type="text" class="form-control " name="fullname" placeholder="Full name" required="" />
            </div>
            <div class="mb-3 text-left ">
                <select name="gender" required id="" class="form-control">
                    <option disabled selected value="Gender">Gender</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <p id="err_gender" class="text-left text-danger"></p>
            </div>
            <div>
                <input type="text" class="form-control" name="phone" placeholder="Phone" required="" />
            </div>
            <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
            </div>
            <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
                <input type="password" class="form-control" name="repass" placeholder="Comfirm Password" required="" />
                <p id="err_repass" class="text-left text-danger"></p>
            </div>
            <div>
                <button class="btn btn-primary submit" from="frmAddStaff" type="submit">Tạo tài khoản</button>
            </div>

            <div class="clearfix"></div>

        </form>
        <script>
            $('#frmAddStaff').on('submit', () => {
                if (frmAddStaff.password.value != frmAddStaff.repass.value) {
                    $('#err_repass').html('Mật khẩu xác nhận sai')
                    return false
                } else {
                    $('#err_repass').html('')
                }

                if (frmAddStaff.gender.value == 'Gender') {
                    $('#err_gender').html('Vui lòng chọn giới tính')
                    return false
                } else {
                    $('#err_gender').html('')
                }

                return true
            })
        </script>
    </section>
</div>
@stop