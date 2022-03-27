<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products = [];
    public $type = 'all';

    public $limit = 8;
    public $isShowModalPreviewProduct = false;
    public $isNoLoadMore = false;

    public function loadMore() {
        $this->isShowModalPreviewProduct = false;
        if(count($this->products) < $this->limit){
            $this->isNoLoadMore = true;
        }else{
            $this->limit += 8;
        }
        // dd(count($this->products));
    }

    public function load($type) {
        $this->type = $type;
        $this->limit = 8;
        $this->isShowModalPreviewProduct = false;
        $this->isNoLoadMore = false;
    }

    public function render()
    {
        if($this->type == 'new'){
            $this->products = Product::take($this->limit)
                ->orderBy('created_at', 'desc')
                ->get();
        }else{
            $this->products = Product::take($this->limit)
                ->get();
        }

        $this->dispatchBrowserEvent('isRenderedCart');
        if(count($this->products) < $this->limit){
            $this->isNoLoadMore = true;
        }else{
            $this->isNoLoadMore = false;
        }

        return view('livewire.products');
    }
}
