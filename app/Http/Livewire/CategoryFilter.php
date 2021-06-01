<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Dollar_Rate;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $products;
    public $category;
    public $search= '';

    protected $paginationTheme = "tailwind";

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $listener = ['addCart' => 'render'];

    public function render()
    {
        $dollar = Dollar_Rate::all();
        $categories = Category::all();

        $productss = Product::where('category_id', $this->category->id)
                              ->where('product', 'LIKE', "%{$this->search}%")
                              ->paginate(15);

        return view('livewire.category-filter', compact('productss','dollar', 'categories'));
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
