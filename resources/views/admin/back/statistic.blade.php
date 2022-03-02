@extends('admin.template.master')

@section('title', "Home | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "W E L C O M E")

@section('content')

<div>
    <div class="text-center">
        Ngày bắt đầu: 
        <select name="" id=""></select>
    </div>
    <div class="text-center">
        Ngày kết thúc: 
        <select name="" id=""></select>
    </div>
</div>


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="text-center">
            <th>MSHD</th>
            <th>Tên khách hàng</th>
            <th>Ngày nhận đơn</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>1</td>
            <td>11%</td>
            <td>Edinburgh</td>
            <td>2022</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td class="text-center">
                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop