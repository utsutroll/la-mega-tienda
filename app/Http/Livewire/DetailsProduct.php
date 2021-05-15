<?php

namespace App\Http\Livewire;

use App\Models\Dollar_Rate;
use Cart;
use Livewire\Component;

class DetailsProduct extends Component
{
    public $product;
    public $similares;

    protected $listener = ['addCart' => 'render'];

    public function render()
    {
        $dollar = Dollar_Rate::all();

        return view('livewire.details-product', compact('dollar'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emit('addCart');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
    }

    public function destroyAll()
    {
        Cart::destroy();
    }
}
