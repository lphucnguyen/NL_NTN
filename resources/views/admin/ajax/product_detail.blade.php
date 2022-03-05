<div class="container">
    <div class="row" sytle="height: 200px !important; ">
        <div class="col d-flex justify-content-center">
            @foreach ($img as $k => $v)
                <img src="{{ asset('images/products') }}/{{ $v->TenHinhAnh }}" class="m-1 img-thumbnail rounded"
                    alt="{{ $product->TenSanPham }}" width="150">
            @endforeach
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-4 text-dark">
        <div class="col">
            <div class="row ">
                <div class="col border-start border-5 border-secondary">
                    <p class="fw-bold fs-3 text-shadow m-0 ps-1">
                        {{ $product->TenSanPham }}
                    </p>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col">
                    <p class="fw-bold fs-6 text-secondary">
                        {{ $product->TenLoaiSanPham }}
                    </p>
                </div>
            </div>
            <div class="row ml-1 mb-3">
                <div class="col ">
                    <small class="fw-bold">
                        Số lượng:
                        {{ $product->SoLuong }}
                    </small>
                </div>
                <div class="col text-right mr-3">
                    <small class="fw-bold">
                        Giá:
                        {{ number_format($product->Gia) }} VNĐ
                    </small>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col">
                    <p>
                        {{ $product->MoTa }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
