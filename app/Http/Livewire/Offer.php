<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Offer extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.offer', compact('products'));
    }
}
