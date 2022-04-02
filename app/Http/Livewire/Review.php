<?php

namespace App\Http\Livewire;

use App\Models\Evaluate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $idProduct;
    public $reviews;
    
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

    public function render()
    {
        $this->reviews = Evaluate::query()->where('product_id', $this->idProduct)->take(8)->get();

        return view('livewire.review');
    }
}
