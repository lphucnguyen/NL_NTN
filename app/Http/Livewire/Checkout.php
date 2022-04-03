<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
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

    public function quantityIsAvalable() {
        $products = Cart::getContent();

        foreach($products as $product){
            $productInDB = Product::findOrFail($product->id);

            if($productInDB->quantity < $product->quantity){
                return false;
            }
        }

        return true;
    }

    public function checkout() {

        $idUser = Auth::id();
        $idPromo = session('id');
        $paymentMethod = $this->payment;
        $total = Cart::getTotal();
        $address = $this->address;
        $note = $this->note;
        $status = 'Chưa xác nhận';

        if($total > 50000000 && $paymentMethod == 'MoMo'){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Hạn mức thanh toán của MoMo 50.000.000 VND',
                'icon' => 'error',
                'timer' => 2000,
            ]);

            return ;
        }

        if(!$this->quantityIsAvalable()){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Hiện tại trong giỏ hàng có sản phẩm đã hết số lượng',
                'icon' => 'error',
                'timer' => 2000,
                'returnURL' => '/home/payment'
            ]);

            return;
        }

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
            $productInDB = Product::findOrFail($product->id);
            $productInDB->quantity = $productInDB->quantity - $product->quantity;
            $productInDB->save();
        }

        Cart::clear();
        session()->forget('id');
        session()->forget('percent');
        session()->forget('code');

        if($this->payment == 'VNPay'){
            return redirect('/home/process/vnpay/' . $order->id);
        }else if($this->payment == 'MoMo'){

            return redirect('/home/process/momo/' . $order->id);
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Đặt hàng thành công',
            'icon' => 'success',
            'timer' => 2000,
            'returnURL' => '/home'
        ]);

    }

    public function render()
    {
        $this->products = Cart::getContent();

        return view('livewire.checkout');
    }
}
