@extends('admin.template.master')

@section('title', "Home | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "W E L C O M E")

@section('content')


<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>MSKM</th>
            <th>Giá trịkhuyến mãi</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>1</td>
            <td>11%</td>
            <td>Edinburgh</td>
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