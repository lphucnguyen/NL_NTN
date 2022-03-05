@extends('admin.template.master')

@section('title', "Product | Admin - NTN Store")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Danh sách hàng hóa")

@section('content')


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="text-center">
            <th>MSHH</th>
            <th>Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Giá tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>001</td>
            <td>Ring Gold</td>
            <td>Images</td>
            <td>27</td>
            <td>Nhẫn vàng</td>
            <td>$112,000</td>
            <td class="text-center">
                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop