<?php

namespace App\Http\Livewire\Admin\UpdatePrice;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use BD;

class UpdatePriceComponent extends Component
{
    public $category;
    public $search ='';
    public $price;
    public $product_id;
     
    public function render()
    {
        $categories = Category::all();

        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->where('category_id', $this->category)
                            ->get();

                        

        return view('livewire.admin.update-price.update-price-component', compact('categories', 'products'));
    }

    public function update($id)
    {
        $product = Product::find($id);

        $this->validate([
            'price' => "required|",  
        ]);

        $product->update(['price' => $this->price]);

        $this->reset(['price']);

    }
}
  