<div class="container-search-header">
    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
        <img src="/client_template/images/icons/icon-close2.png" alt="CLOSE">
    </button>

    <div class="wrap-search-header flex-w p-l-15">
        <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
        </button>
        <input wire:model.debounce.500ms="keyword" class="plh3" type="text" placeholder="Search...">
    </div>
    @if(!$isFirstReder)
    <div class="wrap-table-search-bar">

        <table class="table-search-bar">

            @if(count($products) == 0)
            <tr class="table_head">
                <td colspan="5" class="txt-center d-block pt-3 pb-3 w-100">Không có sản phẩm</td>
            </tr>
            @endif

            @foreach($products as $key => $product)

            <tr class="table_row">
                <td class="column-1">
                    <div style="width: 50px; height: 50px;">
                        <img style="width: 100%; height: 100%;object-fit: cover;" src="{{asset( '/images/products/' . (count($product->images) > 0 ? $product->images[0]->name : ''))}}" alt="IMG">
                    </div>
                </td>
                <td class="column-2">
                    <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" href="/home/product_detail/{{$product->id}}">{{$product->name}}</a>
                </td>
                <td class="column-3">{{number_format($product->price, 0, '.', ',')}} VND</td>
            </tr>

            @endforeach
        </table>
    </div>
    @endif
</div>