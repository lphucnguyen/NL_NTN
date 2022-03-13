@extends('admin.template.master')

@section('title', 'Product Type | Admin - NTN STORE')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách loại hàng hóa')

@section('content')
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

    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Loại sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $k => $v)
                <tr>
                    <td class="text-center">{{ $k + 1 }}</td>
                    <td>{{ $v->TenLoaiSanPham }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button>
                        <a href="/admin/product_type/del/{{ $v->id }}" class="btn btn-danger btn-sm"><i
                                class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
