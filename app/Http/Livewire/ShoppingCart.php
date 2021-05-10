<?php

namespace App\Http\Livewire;

use App\Models\Dollar_Rate;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function render()
    {
        $dollar = Dollar_Rate::all();

        return view('livewire.shopping-cart', compact('dollar'));
    }
}
