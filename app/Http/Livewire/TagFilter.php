<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Dollar_Rate;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class TagFilter extends Component
{
    use WithPagination;

    public $products;
    public $category;
    public $search ='';
    public $tag;

    protected $paginationTheme = "tailwind";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $dollar = Dollar_Rate::all();
        $categories = Category::all();

        $productss = $this->tag->products()->where('product', 'LIKE', "%{$this->search}%")
                              ->paginate(15);

        return view('livewire.tag-filter', compact('productss', 'dollar', 'categories'));
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
