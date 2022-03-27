<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $product;

    public function mount($product){
        $this->product = $product;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('isRenderedCart');

        return view('livewire.product');
    }
}
