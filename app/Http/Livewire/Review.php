<?php

namespace App\Http\Livewire;

use App\Models\Evaluate;
use Livewire\Component;

class Review extends Component
{
    public $idProduct;
    public $reviews = [];
    
    public $content = '';
    public $idUser = 0;
    public $star = 0;

    public function mount($id) {
        $this->idProduct = $id;
    }

    public function submitReview() {
        $createdReview = Evaluate::create([
            'content' => $this->content,
            'user_id' => $this->idUser,
            'product_id' => $this->idProduct,
            'star' => $this->star,
        ]);
    }

    public function render()
    {
        $this->reviews = Evaluate::take(8)->get();

        return view('livewire.review');
    }
}
