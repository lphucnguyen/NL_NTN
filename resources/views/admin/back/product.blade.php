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
            <th>Loại</th>
            <th>Sản phẩm</th>
            <th>Mô tả</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>


    <tbody>
        @foreach ($list_product as $k => $v )
        <tr>
            <td class="text-center">{{ $v->id }}</td>
            <td>{{ $v->TenLoaiSanPham }}</td>
            <td>{{ $v->TenSanPham }}</td>
            <td>{{ $v->MoTa }}</td>
            <td class="text-center">{{ $v->SoLuong }}</td>
            <td class="text-center">{{ number_format($v->Gia) }} VNĐ</td>
            <td class="text-center">
                <a class="btn btn-success btn-sm text-light"><i class="far fa-eye"></i> Xem</a>
                <a class="btn btn-primary btn-sm text-light"><i class="fa fa-edit"></i> Sửa</a>
                <a class="btn btn-danger btn-sm text-light"><i class="fas fa-trash"></i> Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
