@extends('admin.template.master')

@section('title', "Product Type | Admin - NTN STORE")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "Danh sách loại hàng hóa")

@section('content')

<table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>MSLHH</th>
            <th>Loại hàng hóa</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>
                <button class="btn p-2" >Sửa</button>
                <button class="btn p-2" >Xóa</button>
            </td>
        </tr>
    </tbody>
</table>

@stop