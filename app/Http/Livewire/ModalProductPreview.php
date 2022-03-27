<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ModalProductPreview extends Component
{
    public $productQuickView = null;
    public $isShowModalPreviewProduct = false;

    public $idProductAdd = '';
    public $qtyProductAdd = 0;

    protected $listeners = ['viewProduct'];

    public function viewProduct($id) {
        $this->productQuickView = Product::findOrFail($id);
        $this->isShowModalPreviewProduct = true;
        $this->idProductAdd = $id;
        $this->qtyProductAdd = 1;
        $this->dispatchBrowserEvent('isRenderedCart');
        // dd($this->productQuickView);
    }

    public function addToCart() {

        $this->emit('submitAddCart', [
            'idProductAdd' => $this->idProductAdd,
            'qtyProductAdd' => $this->qtyProductAdd
        ]);
    }

    public function addQty() {
        $this->qtyProductAdd++;
    }

    public function subQty() {
        $this->qtyProductAdd--;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('isRenderedCart');
        
        return view('livewire.modal-product-preview');
    }
}
