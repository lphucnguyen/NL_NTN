<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Route;

class ShoppingCart extends Component
{

    public $products = [];
    public $total;
    public $isShowModalCart = false;

    protected $listeners = ['submitAddCart', 'deleteProductCart'];

    public function submitAddCart($request) {
        $product = Product::findOrFail($request['idProductAdd']);
        $images = json_decode(json_encode([
            ['name' => ''],
        ]));

        if($product && count($product->images) > 0){
            $images = $product->images;
        }

        $productCart = Cart::get($request['idProductAdd']);

        if(!is_null($productCart) && $product->quantity < $productCart['quantity'] + $request['qtyProductAdd']){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => $product->name . ' đã đạt số lượng giới hạn',
                'icon' => 'error',
                'timer' => 2000,
            ]);

            return;
        }
        else if(is_null($productCart) && $product->quantity < $request['qtyProductAdd']){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => $product->name . ' đã đạt số lượng giới hạn',
                'icon' => 'error',
                'timer' => 2000,
            ]);

            return;
        }

        Cart::add(
            $request['idProductAdd'],
            $product->name,
            $product->price,
            $request['qtyProductAdd'],
            array(
                'image' => $images[0]->name
            ),
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => $product->name . ' đã thêm vào giỏ hàng',
            'icon' => 'success',
            'timer' => 2000,
        ]);

        $this->dispatchBrowserEvent('productAdded', [
            'total' => count(Cart::getContent()),
        ]);

        $this->isShowModalCart = false;
    }

    public function deleteProductCart($id) {
        $this->isShowModalCart = true;
        
        Cart::remove($id);

        $this->dispatchBrowserEvent('productAdded', [
            'total' => count(Cart::getContent()),
        ]);

        $this->emit('onChangeCart');
    }

    public function render() {
        $this->products = Cart::getContent();
        $this->total = Cart::getTotal();
         
        return view('livewire.shopping-cart');
    }
}
