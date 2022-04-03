@extends('admin.template.master')

@section('title', 'Add Product | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Tạo các sản phẩm mới')

@section('content')

    <div class="col-12 w-100 d-flex justify-content-center">
        <form action="" id="frmQtyNewProduct" onsubmit="return frmQtyNewProduct(this)">
            <div class="form-group">
                <label for="qtyNewProduct" class="form-label">Bạn muốn tạo bao nhiêu sản phẩm mới?</label>
                <input type="number" id="qtyNewProduct" name="qtyNewProduct" min="1" value="1"
                    class="form-control" placeholder="Nhập số lượng sản phẩm mới muốn tạo">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" type="submit" form="frmQtyNewProduct">Bắt đầu</button>
            </div>
        </form>
    </div>

    <form action="{{ route('admin.product.addlist') }}" onsubmit="return checkAddProductList()" id="frmAddProductList"
        method="post" enctype="multipart/form-data">
        @csrf
        <div id="addElement"></div>
        <div class="list_product_new">
            <hr>
            <h3 class="title_newProduct">Sản phẩm thứ 1</h3>
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
                    <select class="form-control" name="type[]" id="" required>
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
                    <input class="form-control" name="name[]" required="required" type="text" />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả sản phẩm<span
                        class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="description[]" id="product_des"></textarea>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Giá<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="price[]" required="required" type="number" />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Số Lượng<span
                        class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="quantity[]" required="required" type="number" />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh<span
                        class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control imgProduct readImg1" name="product_img1[]" accept="image/*" type="file" required />
                    <img src="" class="img-fluid mb-3 demo_img1" alt="">

                    <input class="form-control imgProduct readImg2" name="product_img2[]" accept="image/*" type="file" required />
                    <img src="" class="img-fluid mb-3 demo_img2" alt="">

                    <input class="form-control imgProduct readImg3" name="product_img3[]" accept="image/*" type="file" required />
                    <img src="" class="img-fluid mb-3 demo_img3" alt="">
                </div>
            </div>
        </div>
        <div class="row" id="btnFrmAdd">
            <div class="form-group col">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' form="frmAddProductList" class="btn btn-primary">
                        Thêm sản phẩm
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function checkAddProductList() {
            // $('.imgProduct').each(function(i) {
            //     console.log($(this).val())
            //     if ($(this).val() == null) {
            //         alert("Hình ảnh sản phẩm thứ " + i + " chưa đủ, xin hãy thêm ảnh!")
            //         return false
            //     }
            // })

            // return false
        }

        function frmQtyNewProduct(frm) {
            var sl = frm.qtyNewProduct.value

            const node = $('.list_product_new').eq(0)
            $('.list_product_new').remove()

            for (var i = 0; i < sl; i++) {
                var j = i + 1
                const clone = node.clone(true)
                $('#addElement').append(clone)
                $('.title_newProduct').eq(i).html("Sản phẩm thứ " + j)
            }

            $('.list_product_new').removeClass('d-none')
            $('#btnFrmAdd').removeClass('d-none')
            $('.list_product_new').eq(sl).remove()
            $('#frmAddProductList').trigger("reset")

            return false;
        }
    </script>
@stop
