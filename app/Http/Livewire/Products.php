<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products = [
        [
            "id" => 1,
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "id" => 2,
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "id" => 3,
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ],
        [
            "id" => 4,
            "image" => "client_template/images/product-03.jpg",
            "title" => 'Only Check Trouser',
            'price' => 25000
        ]
    ];

    public $productQuickView = [
        "id" => '',
        "image" => "",
        "title" => '',
        'price' => 0
    ];

    public function viewProduct($id) {
        $this->productQuickView = array_filter($this->products, function($product) use ($id){
            $product['id'] = $id;
        })[0];
        var_dump($this->productQuickView);
    }

    public function render()
    {
        return view('livewire.products');
    }
}
