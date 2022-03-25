@extends('admin.template.master')

@section('title', 'Product Delete List | Admin - NTN Store')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách sản phẩm bị xóa')

@section('content')
    <form action="{{ route('admin.product.restorelist') }}" id="frmRestoreList" method="post">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th>
                            <input type="checkbox" id="check-all" class="flat ">
                        </th>
                        <th class="column-title">Mã SP </th>
                        <th class="column-title">Loại SP </th>
                        <th class="column-title">Tên Sản Phẩm </th>
                        <th class="column-title">Số lượng </th>
                        <th class="column-title">Giá tiền </th>
                        <th class="column-title no-link last"><span class="nobr">Thao tác</span>
                        </th>
                        <th class="bulk-actions" colspan="6">
                            <button class="border-0 fw-bold btn-primary rounded" type="submit" form="frmRestoreList">Khôi phục các mục đã chọn</button>

                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product_list as $k => $v)
                    <tr class="even pointer text-center">
                        <td class="a-center ">
                            <input type="checkbox" class="flat table_records" name="product_records[]" value="{{ $v->id }}">
                        </td>
                        <td class=" ">{{ $v->id }}</td>
                        <td class=" ">{{ $v->name_type }}</td>
                        <td class=" ">{{ $v->name }}</td>
                        <td class=" ">{{ $v->quantity }}</td>
                        <td class=" ">{{ number_format($v->price) }} VNĐ</td>
                        <td class=" last">
                            <a class="btn btn-success btn-sm text-light" onclick="showPD({{ $v->id }})"
                                data-bs-toggle="modal" data-bs-target="#viewProductDetail">
                                <i class="far fa-eye"></i> Chi tiết
                            </a>
                            <a class="btn btn-primary btn-sm text-light"
                                href="/admin/product/restore/{{ $v->id }}">
                                <i class="far fa-trash-undo"></i> Khôi phục
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
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
