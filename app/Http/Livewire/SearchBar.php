<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{
    public $keyword = '';
    public $products = [];
    public $isFirstReder = true;

    public function updatedKeyword() {
        $this->isFirstReder = false;
        
        if($this->keyword == ''){
            $this->isFirstReder = true;
        }
    }

    public function render()
    {
        $this->products = Product::query()
                                ->searchName($this->keyword)
                                ->take(4)
                                ->get();

        return view('livewire.search-bar');
    }
}
