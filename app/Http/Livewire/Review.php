<?php

namespace App\Http\Livewire;

use App\Models\Evaluate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $idProduct;
    public $reviews;
    public $limit = 4;
    public $page = 0;
    
    public $content = '';
    public $idUser = 0;
    public $star = 0;

    public function mount($id) {
        $this->idProduct = $id;
        $this->idUser = Auth::id();
    }

    public function submitReview() {
        $createdReview = Evaluate::create([
            'content' => $this->content,
            'user_id' => $this->idUser,
            'product_id' => $this->idProduct,
            'star' => $this->star,
        ]);

        if($createdReview){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thành công',
                'text' => 'Đánh giá thành công',
                'icon' => 'success',
                'timer' => 2000,
            ]);

            $this->reviews->push($createdReview);
            $this->content = '';
            $this->star = 0;

            $this->dispatchBrowserEvent('addReviewSuccess', [
                'numberReviews' => count($this->reviews),
            ]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Đánh giá thất bại',
                'icon' => 'error',
                'timer' => 2000,
            ]);
        }
    }

    public function addStar($number) {
        $this->star = $number;
    }

    public function next() {
        $reviews = Evaluate::query()
                            ->where('product_id', $this->idProduct)
                            ->skip(($this->page + 1) * $this->limit)
                            ->take($this->limit)
                            ->get();
        if(count($reviews) == 0) return;
        $this->page++;
    }

    public function prev() {
        if($this->page == 0) return;
        $this->page--;
    }


    public function render()
    {
        $this->reviews = Evaluate::query()
                                    ->where('product_id', $this->idProduct)
                                    ->orderBy('created_at', 'desc')
                                    ->skip($this->page * $this->limit)
                                    ->take($this->limit)
                                    ->get();

        return view('livewire.review');
    }
}
