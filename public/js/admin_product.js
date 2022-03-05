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

//Xoa san pham
function deleteProduct(id, name){
    var c = confirm("Bạn có chắc muốn xóa sản phẩm \""+name+"\"")

    if (c){
        window.location.href = "/admin/product/delete/"+id
    }
}
