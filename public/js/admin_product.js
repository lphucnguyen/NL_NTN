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
