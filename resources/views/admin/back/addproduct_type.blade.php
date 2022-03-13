@extends('admin.template.master')

@section('title', 'Add Product Type | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Thêm loại sản phẩm')

@section('content')
    <div class="x_content">
        <div class="text-center">
            <img src="{{ asset('images/system/logo.png') }}" width="280" alt="logo" />
        </div>

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

        <form action="" id="frmAddProductType" method="post" enctype="multipart/form-data">
            @csrf

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Mã loại sản phẩm<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="AUTO"
                        disabled required="required" />
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
                        <button type='submit' form="frmAddProductType" class="btn btn-primary">Thêm loại sản phẩm</button>
                        <button type="reset" form="frmAddProductType" onclick="resetfrm()"
                            class="btn btn-success">Reset</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

@stop
