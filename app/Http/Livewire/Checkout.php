<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $products = [];
    public $total = 0;
    public $note = '';
    public $address = '';
    public $payment = 'Thanh toán khi nhận hàng';
    public $coupon = [
        'id' => 0,
        'name' => '',
        'percent' => 0,
        'code' => ''
    ];

    public function mount($products, $total){
        $this->products = $products;
        $this->total = $total;
        $this->address = Auth::user()->address;

        $this->coupon['id'] = session('id');
        $this->coupon['name'] = session('name');
        $this->coupon['percent'] = session('percent');
        $this->coupon['code'] = session('code');
    }

    public function checkout() {

        $idUser = Auth::id();
        $idPromo = session('id');
        $paymentMethod = $this->payment;
        $total = Cart::getTotal();
        $address = $this->address;
        $note = $this->note;
        $status = 'Đang xử lý';

        $order = Order::create([
            'user_id' => $idUser,
            'promotion_id' => $idPromo,
            'total' => $total,
            'address' => $address,
            'note' => $note,
            'status' => $status,
            'payment_method' => $paymentMethod
        ]);

        foreach(Cart::getContent() as $product){
            OrderDetail::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
                'quantity' => $product->quantity,
                'amount' => $product->price
            ]);
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Đặt hàng thành công',
            'icon' => 'success',
            'timer' => 2000,
            'code' => 'checkout'
        ]);


        Cart::clear();
        session()->forget('id');
        session()->forget('percent');
        session()->forget('code');

    }

    public function render()
    {
        $this->products = Cart::getContent();

        return view('livewire.checkout');
    }
}
