<form action="/admin/product_type/edit/{{ $pt->id }}" method="post" onsubmit="return checkFrmEditProductType()">
    @csrf
    <div class="mb-3">
        <label for="idProductType" class="form-label">ID Loại sản phẩm:</label>
        <input type="text" name="id" class="form-control" id="idProductType" readonly value="{{ $pt->id }}">
    </div>
    <div class="mb-3">
        <label for="oldNamePT" class="form-label">Tên loại sản phẩm hiện tại:</label>
        <input type="text" class="form-control" name="old_name" id="oldNamePT" readonly value="{{ $pt->name_type }}">
    </div>
    <div class="mb-5">
        <label for="newNamePT" class="form-label">Tên loại sản phẩm mới:</label>
        <input type="text" class="form-control" name="name_type" id="newNamePT">
        <div><p class="text-danger" id="err_newNamePT"></p></div>
    </div>
    <div class="mt-3 text-right">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-success">Reset</button>
    </div>
</form>

<script>
    function checkFrmEditProductType(){
        var v = document.getElementById('newNamePT').value
        if(v.length <1 ){
            document.getElementById('err_newNamePT').innerHTML = "Trường này không được bỏ trống!";
            return false
        }

        return true
    }
</script>
