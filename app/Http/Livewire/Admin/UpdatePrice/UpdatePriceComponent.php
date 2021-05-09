<?php

namespace App\Http\Livewire\Admin\UpdatePrice;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
<<<<<<< HEAD
use Maatwebsite\Excel\Facade\Excel;
use BD;


=======
use BD;

>>>>>>> a4de67db9f1452e7a7c31e1e688ad45e2bb16625
class UpdatePriceComponent extends Component
{
    public $category;
    public $search ='';
    public $price;
    public $product_id;
    
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
            $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->where('category_id', $this->category)
                            ->paginate(10);

                        

        return view('livewire.admin.update-price.update-price-component', compact('categories', 'products'));
    }

    public function update($id)
    {
        $product = Product::find($id);

        $this->validate([
            'price' => "required",  
        ]);

        $product->update(['price' => $this->price]);

        $this->reset(['price']);

    }
<<<<<<< HEAD

    public function export()
    {
        return Exel::download(new ProductsExport, 'product-list.xlsx');
    }
=======
>>>>>>> a4de67db9f1452e7a7c31e1e688ad45e2bb16625
}
  