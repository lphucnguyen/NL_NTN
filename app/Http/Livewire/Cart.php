<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $products = [
        [
            'id' => 1,
            'image' => 'client_template/images/item-cart-01.jpg',
            'name' => 'White Shirt Pleat',
            'price' => 19,
            'quantity' => 1
        ],
        [
            'id' => 2,
            'image' => 'client_template/images/item-cart-02.jpg',
            'name' => 'White Shirt Pleat',
            'price' => 19,
            'quantity' => 1
        ],
        [
            'id' => 2,
            'image' => 'client_template/images/item-cart-03.jpg',
            'name' => 'White Shirt Pleat',
            'price' => 19,
            'quantity' => 1
        ],
    ];

    public function render()
    {
        return view('livewire.cart');
    }
}
