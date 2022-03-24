@extends('admin.template.master')

@section('title', 'Product Type | Admin - NTN STORE')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách loại hàng hóa')

@section('content')
    <div class="text-right">
        <a class="btn btn-success btn-sm text-light" data-bs-toggle="modal" data-bs-target="#addProductType">
            <i class="far fa-plus"></i> Thêm loại sản phẩm
        </a>
    </div>
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
                    <td class="text-center">{{ $v->id }}</td>
                    <td>{{ $v->name_type }}</td>
                    <td class="text-center text-light">
                        <button class="btn btn-primary btn-sm" onclick="editProductType({{ $v->id }})"
                            data-bs-toggle="modal" data-bs-target="#editProductType">
                            <i class="fa fa-edit"></i> Sửa
                        </button>
                        {{-- <a onclick="deleteProductType({{ $v->id }}, '{{ $v->name_type }}')"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a> --}}
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
                    <h5 class="modal-title" id="exampleModalLabel"><b> Chỉnh sửa loại sản phẩm </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_editProductType">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Product Type-->
    <div class="modal fade " id="addProductType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Thêm loại sản phẩm </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_addProductType">
                    <form action="{{ route('admin.product_type.add') }}" id="frmAddProductType" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mã loại sản phẩm<span
                                    class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                    value="AUTO" disabled required="required" />
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên loại sản phẩm<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="product_type_name" required="required" type="text" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' form="frmAddProductType" class="btn btn-primary">Thêm loại sản
                                        phẩm</button>
                                    <button type="reset" form="frmAddProductType" onclick="resetfrm()"
                                        class="btn btn-success">Reset</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script src="{{ asset('js/admin_product.js') }}"></script>
@stop
