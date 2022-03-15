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
                    <td>{{ $v->name_type }}</td>
                    <td class="text-center text-light">
                        <button class="btn btn-primary btn-sm" onclick="editProductType({{ $v->id }})"
                            data-bs-toggle="modal" data-bs-target="#editProductType">
                            <i class="fa fa-edit"></i> Sửa
                        </button>
                        <a onclick="deleteProductType({{ $v->id }}, '{{ $v->name_type }}')"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal Edit Product Type-->
    <div class="modal fade " id="editProductType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Edit Product Type </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_editProductType">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>


    {{-- JavaScript --}}
    <script src="{{ asset('js/admin_product.js') }}"></script>
@stop
