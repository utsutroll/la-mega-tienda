<?php

namespace App\Http\Livewire;

use App\Models\Dollar_Rate;
use Cart;
use Livewire\Component;

class ShoppingCart extends Component
{

    public function render()
    {
        $dollar = Dollar_Rate::all();

        return view('livewire.shopping-cart', compact('dollar'));
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
}
