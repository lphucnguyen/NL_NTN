<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Promotion;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Cart;

class Payment extends Component
{
    public $products = [];
    public $total;
    public $subTotal = 0;
    public $coupon = [
        'name' => '',
        'percent' => 0,
        'code' => ''
    ];

    public $name;

    protected $listeners = ['onChangeCart'];

    public function addCoupon() {
        $coupon = Promotion::query()
                    ->where('code', '=', strtoupper($this->coupon['code']))
                    ->get();
        
        if(count($coupon) == 0){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Không tồn tại mã coupon',
                'icon' => 'error'
            ]);

            return;
        }

        // dd(Carbon::parse($coupon[0]->end_date)->isPast());

        $isPastStartDate = Carbon::parse($coupon[0]->start_date)->isFuture();
        $isFutureEndDate = Carbon::parse($coupon[0]->end_date)->isPast();

        if($isPastStartDate || $isFutureEndDate){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Mã coupon không thể sử dụng',
                'icon' => 'error'
            ]);

            return;
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Mã coupon đã thêm thành công',
            'icon' => 'success'
        ]);

        $percent = $coupon[0]->percent;
        $products = Cart::getContent();

        $condition1 = new \Darryldecode\Cart\CartCondition(array(
            'name' => $coupon[0]->content,
            'code' => $this->coupon['code'],
            'type' => 'sale',
            'value' => "-$percent%",
        ));

        foreach($products as $product){
            Cart::clearItemConditions($product->id);
        }

        foreach($products as $product){
            Cart::addItemCondition($product->id, $condition1);
        }

        
        $this->coupon['name'] = $coupon[0]->content;
        $this->coupon['percent'] = $percent;

        session([
            'id' => $coupon[0]->id,
            'name' =>  $coupon[0]->content,
            'percent' => $percent,
            'code' => $this->coupon['code']
        ]);
    }

    public function changeQuantityProduct($requests) {
        // dd($quantity);

        foreach($requests as $key => $quantity){
            if($quantity <= 0){
                Cart::remove($key);
            }else{
                Cart::update($key, ['quantity' => 
                    [
                        'relative' => false,
                        'value' => $quantity
                    ]
                ]);
            }
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Cập nhật giỏ hàng thành công',
            'icon' => 'success',
            'timer' => 2000,
        ]);
    }

    public function onChangeCart() {
        $this->products = Cart::getContent();
        $this->total = Cart::getTotal();
        $this->subTotal = Cart::getSubTotal();
    }

    public function mount() {
        $this->coupon['name'] = session('name');
        $this->coupon['percent'] = session('percent');
        $this->coupon['code'] = session('code');
    }

    public function productsWithMaxQuantity() {
        $products = Cart::getContent();

        foreach($products as $product){
            $productInDB = Product::findOrFail($product->id);

            if($productInDB->quantity == 0){
                Cart::remove($product->id);
            }
            else if($productInDB->quantity < $product->quantity){
                Cart::update($product->id, ['quantity' => 
                    [
                        'relative' => false,
                        'value' => $productInDB->quantity
                    ]
                ]);
            }
        }
    }

    public function render()
    {
        $this->productsWithMaxQuantity();
        
        $this->products = Cart::getContent();
        $this->total = Cart::getTotal();
        $this->subTotal = Cart::getSubTotal();

        return view('livewire.payment');
    }
}
