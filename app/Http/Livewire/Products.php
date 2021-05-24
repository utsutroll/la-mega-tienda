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
    public $entries = '30';
    public $category;

    protected $paginationTheme = "tailwind";

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'entries' => ['except' => '30']
    ];
    
    protected $listener = ['addCart' => 'render'];

    public function render()
    {
        
        $categories = Category::all();
        $dollar = Dollar_Rate::all();
        
        $products = Product::Where('product', 'LIKE', "%{$this->search}%")
                            ->orWhere('category_id', $this->category)
                            ->paginate($this->entries);

        return view('livewire.products', compact('categories', 'dollar', 'products'));
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
