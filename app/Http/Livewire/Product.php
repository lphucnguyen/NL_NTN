<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $products = [
        [
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ]
    ];

    public function render()
    {
        return view('livewire.product');
    }
}
