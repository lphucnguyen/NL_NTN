@extends('admin.template.master')

@section('title', 'Add Product | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Thêm sản phẩm')

@section('content')
    <div class="x_content">
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

        <form action="" id="frmAddProduct" method="post" enctype="multipart/form-data">
            @csrf

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">MSSH<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="AUTO"
                        disabled required="required" />
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
                <label class="col-form-label col-md-3 col-sm-3 label-align">Giá<span class="required">*</span></label>
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
                    <input class="form-control" name="product_img1" onchange="readImg1(this);" accept="image/*"
                        required="required" type="file" />
                    <img src="" id="demo-img1" class="img-fluid mb-3" alt="">

                    <input class="form-control" name="product_img2" onchange="readImg2(this);" accept="image/*"
                        required="required" type="file" />
                    <img src="" id="demo-img2" class="img-fluid mb-3" alt="">

                    <input class="form-control" name="product_img3" onchange="readImg3(this);" accept="image/*"
                        required="required" type="file" />
                    <img src="" id="demo-img3" class="img-fluid mb-3" alt="">
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <div class="col-md-6 offset-md-3">
                        <button type='submit' form="frmAddProduct" class="btn btn-primary">Thêm sản phẩm</button>
                        <button type="reset" form="frmAddProduct" onclick="resetfrm()"
                            class="btn btn-success">Reset</button>
                    </div>
                </div>
            </div>

        </form>
    </div>


    {{-- Javascript --}}
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
