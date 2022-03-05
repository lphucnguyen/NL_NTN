@extends('admin.template.master')

@section('title', 'Home | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'W E L C O M E')

@section('content')


    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0"
        width="100%">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $k => $v)
                <tr class="text-center">
                    <td>{{ $k+1 }}</td>
                    <td>
                        <div class="row text-center">
                            <div class="col d-flex flex-column align-items-center">
                                <img src="{{ asset('images/avatar/'. $v->Avatar) }}" class="img-thumbnail rounded" width="100" alt="ảnh đại diện">
                                <b>{{ $v->HoTen }}</b>
                            </div>
                        </div>
                    </td>
                    <td>{{ $v->SoDienThoai }}</td>
                    <td>{{ $v->GioiTinh }}</td>
                    <td>{{ $v->DiaChi }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
