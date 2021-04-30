<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Dollar_Rate;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

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

    public function render()
    {
        $categories = Category::all();
        $dollar = Dollar_Rate::all();
        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->orWhere('category_id', $this->category)
                            ->paginate(30);

        return view('livewire.products', compact('categories', 'dollar', 'products'));
    }
}
