@extends('admin.template.master')

@section('title', "Product | Admin - NTN Store")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Danh sách hàng hóa")

@section('content')


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>MSHH</th>
            <th>Hàng hóa</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Giá tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>Donna Snider</td>
            <td>Customer Support</td>
            <td>New York</td>
            <td>27</td>
            <td>2011/01/25</td>
            <td>$112,000</td>
            <td>
                <button class="btn p-2">Sửa</button>
                <button class="btn p-2">Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop