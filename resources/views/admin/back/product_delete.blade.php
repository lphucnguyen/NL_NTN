@extends('admin.template.master')

@section('title', 'Product Delete List | Admin - NTN Store')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách sản phẩm bị xóa')

@section('content')
    <div class="text-right">
        <button class="btn btn-success text-light" type="submit" form="frmRestoreList">Restore</button>
    </div>
    <form action="{{ route('admin.product.restorelist') }}" id="frmRestoreList" method="post">
        @csrf
        <table id="datatable" class="table table-striped table-bordered bulk_action  rounded" style="width:100%">
            <div>
            </div>
            <thead>
                <tr class="text-center">
                    <th>
                        {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" onchange="checkAll(this)" id="checkboxAll">
                    </div> --}}
                    </th>
                    <th>Mã SP</th>
                    <th>Loại</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_list as $k => $v)
                    <tr>
                        <td class="text-center">
                            <div class="form-check">
                                <input class="form-check-input checkboxProduct" type="checkbox" name="product_id[]"
                                    value="{{ $v->id }}">
                            </div>
                        </td>
                        <td class="text-center">{{ $v->id }}</td>
                        <td>{{ $v->name_type }}</td>
                        <td>{{ $v->name }}</td>
                        <td class="text-center">{{ $v->quantity }}</td>
                        <td class="text-center">{{ number_format($v->price) }} VNĐ</td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm text-light" onclick="showPD({{ $v->id }})"
                                data-bs-toggle="modal" data-bs-target="#viewProductDetail">
                                <i class="far fa-eye"></i> Chi tiết
                            </a>
                            <a class="btn btn-primary btn-sm text-light" href="/admin/product/restore/{{ $v->id }}">
                                <i class="far fa-trash-undo"></i> Khôi phục
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>


    <!-- Modal Product Detail-->
    <div class="modal fade " id="viewProductDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Product Detail </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_product_detail">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit Product-->
    <div class="modal fade " id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Chỉnh sửa sản phẩm </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_editProduct">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Product-->
    <div class="modal fade " id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Thêm sản phẩm </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_addProduct">
                    <form action="{{ route('admin.product.add') }}" id="frmAddProduct" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">MSSH<span
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
                                <select class="form-control" name="product_type" id="" required>
                                    @foreach ($product_type as $v)
                                        <option value="{{ $v->id }}">{{ $v->name_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên sản phẩm<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="product_name" required="required" type="text" />
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả sản phẩm<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control" name="product_des" id="product_des"></textarea>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Giá<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="product_price" required="required" type="number" />
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số Lượng<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="product_quantity" required="required" type="number" />
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh<span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="product_img1" onchange="readImg1(this);"
                                    accept="image/*" required="required" type="file" />
                                <img src="" id="demo-img1" class="img-fluid mb-3" alt="">

                                <input class="form-control" name="product_img2" onchange="readImg2(this);"
                                    accept="image/*" required="required" type="file" />
                                <img src="" id="demo-img2" class="img-fluid mb-3" alt="">

                                <input class="form-control" name="product_img3" onchange="readImg3(this);"
                                    accept="image/*" required="required" type="file" />
                                <img src="" id="demo-img3" class="img-fluid mb-3" alt="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' form="frmAddProduct" class="btn btn-primary">Thêm sản
                                        phẩm</button>
                                    <button type="reset" form="frmAddProduct" onclick="resetfrm()"
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
    <script>
        function readImg1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#demo-img1').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readImg2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#demo-img2').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readImg3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#demo-img3').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetfrm() {
            $('#demo-img1').attr('src', null);
            $('#demo-img2').attr('src', null);
            $('#demo-img3').attr('src', null);
        }
    </script>
@stop
