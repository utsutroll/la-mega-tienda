<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Dollar_Rate;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class Products extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except' => ''],
    ];
    
    protected $listener = ['addCart' => 'render'];

    public function render()
    {
        
        $categories = Category::all();
        $dollar = Dollar_Rate::all();
        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->orWhere('category_id', $this->category)
                            ->paginate(30);

        return view('livewire.products', compact('categories', 'dollar', 'products'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emit('addCart');
    }
}
