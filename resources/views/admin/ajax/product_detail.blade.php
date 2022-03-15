<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            @foreach ($img as $k => $v)
                <img src="{{ asset('images/products') }}/{{ $v->name }}" class="m-1 img-thumbnail rounded img-product-detail"
                    alt="{{ $product->name }}" width="150">
            @endforeach
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-4 text-dark">
        <div class="col">
            <div class="row ">
                <div class="col border-start border-5 border-secondary">
                    <p class="fw-bold fs-3 text-shadow m-0 ps-1">
                        {{ $product->name }}
                    </p>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col">
                    <p class="fw-bold fs-6 text-muted">
                        {{ $product->name_type }}
                    </p>
                </div>
            </div>
            <div class="row ml-1 mb-3 fw-bold">
                <div class="col ">
                    Số lượng:
                    {{ $product->quantity }}
                </div>
                <div class="col text-right mr-3">
                    Giá:
                    {{ number_format($product->price) }} VNĐ
                </div>
            </div>
            <div class="row ml-1">
                <div class="col">
                    <p class="fw-bold mb-0">
                        Mô tả
                    </p>
                    <hr class="mt-0">
                    <textarea class="textarea_des" readonly>
                            {{ $product->description }}
                        </textarea>
                </div>
            </div>
        </div>
    </div>
</div>
