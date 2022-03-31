@extends('admin.template.master')

@section('title', 'Product | Admin - NTN Store')

@section('x_heading', 'Danh sách hàng hóa')

@section('content')
    <div class="text-right">
        <a class="btn btn-success btn-sm text-light" data-bs-toggle="modal" data-bs-target="#addProduct">
            <i class="far fa-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <form action="{{ route('admin.product.deletes') }}" id="frmDeleteList" method="post">
        @csrf
        <table id="datatable" class="table table-striped table-bordered rounded bulk_action" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>
                        <input type="checkbox" id="check-all" class="flat ">
                    </th>
                    <th class="column-title">ID</th>
                    <th class="column-title">Loại</th>
                    <th class="column-title">Sản phẩm</th>
                    <th class="column-title">Số lượng</th>
                    <th class="column-title">Giá tiền</th>
                    <th class="column-title">Thao tác</th>
                    <th class="bulk-actions text-left " colspan="6">
                        <div class="dropdown text-dark">
                            <button class="btn btn-transparent border-0 p-0 m-0 text-light dropdown-toggle text-dark" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Thao tác
                            </button>
                            <div class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton">
                                <button class="dropdown-item btn_submit" type="submit" form="frmDeleteList">
                                    Xóa các mục đã chọn
                                </button>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_list as $k => $v)
                    <tr>
                        <td class="a-center ">
                            <input type="checkbox" class="flat table_records" name="product_records[]"
                                value="{{ $v->id }}">
                        </td>
                        <td class="text-center">{{ $v->id }}</td>
                        <td>{{ $v->name_type }}</td>
                        <td>{{ $v->name }}</td>
                        <td class="text-center">{{ $v->quantity }}</td>
                        <td class="text-center">{{ number_format($v->price) }} VNĐ</td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm text-light" onclick="showPD({{ $v->id }})"
                                data-bs-toggle="modal" data-bs-target="#viewProductDetail"><i class="far fa-eye"></i>
                                Chi
                                tiết</a>
                            <a class="btn btn-primary btn-sm text-light" onclick="editProduct({{ $v->id }})"
                                data-bs-toggle="modal" data-bs-target="#editProduct"><i class="fa fa-edit"></i> Sửa</a>
                            <a class="btn btn-danger btn-sm text-light"
                                onclick="deleteProduct({{ $v->id }}, '{{ $v->name }}')"><i
                                    class="fas fa-trash"></i> Xóa</a>
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
            console.log(input)
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
