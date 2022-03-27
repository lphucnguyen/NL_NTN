<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Cart;

class Payment extends Component
{
    public $products = [];
    public $total;
    public $subTotal;
    public $coupon;

    public $name;

    protected $listeners = ['onChangeCart'];

    public function addCoupon() {
        $coupon = Promotion::query()
                    ->where('code', '=', $this->coupon)
                    ->get();
        
        if(count($coupon) == 0){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Không tồn tại mã coupon',
                'icon' => 'error'
            ]);
        }
    }

    public function changeQuantityProduct($requests) {
        // dd($quantity);

        foreach($requests as $key => $quantity){
            if($quantity <= 0){
                Cart::remove($key);
            }else{
                $product = Cart::update($key, ['quantity' => 
                    [
                        'relative' => false,
                        'value' => $quantity
                    ]
                ]);
            }
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thành công',
                'text' => 'Cập nhật giỏ hàng thành công',
                'icon' => 'success',
                'timer' => 2000,
            ]);
        }
    }

    public function onChangeCart() {
        $this->products = Cart::getContent();
        $this->total = Cart::getTotal();
        $this->subTotal = Cart::getSubTotal();
    }

    public function render()
    {
        $this->products = Cart::getContent();
        $this->total = Cart::getTotal();
        $this->subTotal = Cart::getSubTotal();

        return view('livewire.payment');
    }
}
