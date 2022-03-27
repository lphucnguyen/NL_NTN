<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public $products = [];
    public $total = 0;

    public function mount($products, $total){
        $this->products = $products;
        $this->total = $total;
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
