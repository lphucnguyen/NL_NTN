@extends('admin.template.master')

@section('title', "Product Type | Admin - NTN STORE")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Danh sách loại hàng hóa")

@section('content')

<table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="text-center">
            <th>MSLSP</th>
            <th>Loại sản phẩm</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td class="text-center">
                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop