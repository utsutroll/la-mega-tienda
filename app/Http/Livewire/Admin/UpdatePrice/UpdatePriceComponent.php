<?php

namespace App\Http\Livewire\Admin\UpdatePrice;

use App\Models\Product;
use App\Models\Categories;
use Livewire\Component;

class UpdatePriceComponent extends Component
{
    public $category;
     
    public function render()
    {

        $categories = Categories::all();

        $products = Product::where('category_id', $this->category)->get();
        
        return view('livewire.admin.update-price.update-price-component', compact('categories','products'));
    }

}
  