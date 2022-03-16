<form action="/admin/product/edit/{{ $product->id }}" id="frmEditProduct" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="id" class="form-label">ID sản phẩm:</label>
        <input type="text" name="id" class="form-control" id="id" readonly value="{{ $product->id }}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm :</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Loại sản phẩm:</label>
        <select name="type" id="type" class="form-control">
            @foreach ($product_type as $k => $v)
                <option value="{{ $v->id }}" @if ($v->id == $product->type) selected @endif>
                    {{ $v->name_type }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá:</label>
        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng:</label>
        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea class="d-block" name="description" id="description" cols="30" rows="10"
            style="width: 100%">{{ $product->description }}</textarea>
    </div>

    {{-- ========================IMG============================= --}}
    <div class="mb-3">
        <label for="img1" class="form-label">Ảnh 1:</label>
        <input type="hidden" name="id_img1_old" value="{{ $img[0]->id }}">
        <input type="file" class="form-control" name="img1" id="img1" onchange="readImg1(this);" accept="image/*">
        <div class="row d-flex mt-2">
            <div class="col">
                <div class="card text-center">
                    <img src="{{ asset('images/products') }}/{{ $img[0]->name }}" class="card-img-top border rounded" alt="img1">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh 1 hiện tại</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <img src="" class="card-img-top border rounded" id="new_img1" alt="Ảnh mới">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh mới 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="img2" class="form-label">Ảnh 2:</label>
        <input type="hidden" name="id_img2_old" value="{{ $img[1]->id }}">
        <input type="file" class="form-control" name="img2" id="img2" onchange="readImg2(this);" accept="image/*">
        <div class="row d-flex mt-2">
            <div class="col">
                <div class="card text-center">
                    <img src="{{ asset('images/products') }}/{{ $img[1]->name }}" class="card-img-top border rounded" alt="img2">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh 2 hiện tại</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <img src="" class="card-img-top border rounded" id="new_img2" alt="Ảnh mới">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh mới 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="img3" class="form-label">Ảnh 3:</label>
        <input type="hidden" name="id_img3_old" value="{{ $img[2]->id }}">
        <input type="file" class="form-control" name="img3" id="img3" onchange="readImg3(this);" accept="image/*">
        <div class="row d-flex mt-2">
            <div class="col">
                <div class="card text-center">
                    <img src="{{ asset('images/products') }}/{{ $img[2]->name }}" class="card-img-top border rounded" alt="img3">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh 3 hiện tại</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <img src="" class="card-img-top border rounded" id="new_img3" alt="Ảnh mới">
                    <div class="card-body ">
                        <p class="p-0 m-0 fw-bold">Ảnh mới 3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================/IMG============================= --}}

    <div class="mt-3 text-right">
        <button type="submit" class="btn btn-primary" form="frmEditProduct">Lưu</button>
        <button type="reset" onclick="resetfrm()" class="btn btn-success">Reset</button>
    </div>
</form>


{{-- Javascript --}}
<script>
    function readImg1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#new_img1').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#new_img2').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readImg3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#new_img3').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetfrm() {
        $('#new_img1').attr('src', null);
        $('#new_img2').attr('src', null);
        $('#new_img3').attr('src', null);
    }
</script>
