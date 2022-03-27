<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

class ProductFilter extends Component
{
    public $categories = [];
    public $products = [];

    public $isNoLoadMore = false;
    public $isShowSearch = false;
    public $isShowFilter = false;
    public $limit = 8;

    public $search = '';
    public $categoryFilter = 0;
    public $priceFilter = 'all';
    public $sortBy = 'all';
    public $sortByPrice = 'all';

    public $filter = [
        'price' => [
            'all' => ['all', 'all'],
            '0-10000000' => [0, 10000000],
            '10000000-20000000' => [10000000, 20000000],
            '20000000-30000000' => [20000000, 30000000],
            '30000000-40000000' => [30000000, 40000000],
            '40000000+' => [40000000, 0],
        ],
        'sortBy' => [
            'all' => 'all',
            'newest' => 'newest',
        ],
        'sortByPrice' => [
            'all' => 'all',
            'desc' => 'desc',
            'asc' => 'asc'
        ],
    ];

    public function filterByCategory($id) {
        $this->categoryFilter = $id;

        $this->limit = 8;
    }

    public function filterSortBy($sortBy) {
        $this->sortBy = $sortBy;
    }

    public function filterPrice($price) {
        $this->priceFilter = $price;
    }

    public function filterSortByPrice($sortByPrice) {
        $this->sortByPrice = $sortByPrice;
    }

    public function showFilter() {
        $this->isShowFilter = !$this->isShowFilter;
    }

    public function showSearch() {
        $this->isShowSearch = !$this->isShowSearch;
    }

    public function loadMore() {
        if(count($this->products) < $this->limit){
            $this->isNoLoadMore = true;
        }else{
            $this->limit += 8;
        }
    }

    public function mount() {
        $this->categories = ProductType::take(5)->get();
    }

    public function render()
    {
        $priceFilter = $this->filter['price'][$this->priceFilter];
        $categoryFilter = $this->categoryFilter;
        $sortBy = $this->filter['sortBy'][$this->sortBy];
        $sortByPrice = $this->filter['sortByPrice'][$this->sortByPrice];
        $search = $this->search;

        $products = Product::query()
                            ->price($priceFilter)
                            ->type($categoryFilter)
                            ->newest($sortBy)
                            ->orderByPrice($sortByPrice)
                            ->searchName($search)
                            ->take($this->limit)
                            ->get();
        $this->products = $products;
        if(count($products) < $this->limit){
            $this->isNoLoadMore = true;
        }else{
            $this->isNoLoadMore = false;
        }
        

        return view('livewire.product-filter');
    }
}
