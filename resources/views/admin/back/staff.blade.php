@extends('admin.template.master')

@section('title', "Home | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "W E L C O M E")

@section('content')


<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0"
    width="100%">
    <thead>
    <tr class="text-center">
            <th>MSNV</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Ảnh đại diện</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <td>admin</td>
            <td>Nixon</td>
            <td>0123456789</td>
            <td>Nam</td>
            <td>Can Thơ</td>
            <td>admin</td>
            <td>1234</td>
            <td>
                <img src="" alt="ảnh đại diện">
            </td>
            <td class="text-center">
                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop