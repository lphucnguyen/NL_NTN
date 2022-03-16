//Chi tiết sản phẩm
function showPD(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/admin/product/pd/'+id,
        success: function(result){
            $('#modal_product_detail').html(result);
        }
    })
}

function editProduct(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/admin/product/edit/'+id,
        success: function(result){
            $('#modal_editProduct').html(result);
        }
    })
}

//Xoa san pham
function deleteProduct(id, name){
    var c = confirm("Bạn có chắc muốn xóa sản phẩm \""+name+"\"")

    if (c){
        window.location.href = "/admin/product/delete/"+id
    }
}

//Delete Product Type
function deleteProductType(id, name){
    var c = confirm("Bạn có chắc muốn xóa loại sản phẩm \""+name+"\" \nĐiều này sẽ xóa toàn bộ những sản phẩm, hình ảnh và những thông tin liên quan khác, bạn sẽ chịu hoàn toàn trách nhiệm về hành động này. \nHoặc bạn có  thể chỉnh sửa tên của loại sản phẩm. \n\nBạn vẫn tiếp tục muốn xóa chứ?")

    if (c){
        window.location.href = "/admin/product_type/del/"+id
    }
}


//editProductType
function editProductType(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/admin/product_type/edit/'+id,
        success: function(result){
            $('#modal_editProductType').html(result);
        }
    })
}
