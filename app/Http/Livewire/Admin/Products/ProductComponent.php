<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
    /* Variables */
    public $search = '';
    public $entries = '5';
    public $sort = 'id';
    public $direcction = 'desc';
    public $status_p;
    /* End Variables */

    /* Table */

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
            $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'entries' => ['except' => '5']
    ];


    protected $listeners = ['render', 'render'];

    public function render()
    {
        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->orderBy($this->sort, $this->direcction)
                            ->paginate($this->entries);

        return view('livewire.admin.products.product-component', compact('products'));
    }

    public function order($sort){

        if ($this->sort == $sort) {
            
            if ($this->direcction == 'desc') {
                $this->direcction = 'asc';
            }else{
                $this->direcction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direcction = 'asc';
        }
        
    }
    public function clear(){

        $this->search = '';
        $this->page = 1;
        $this->entries = '5';

    }
    /* End Table */

    /* Destroy */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();
            $this->emit('ProductDeleted');
            
        } catch (\Exception $e) {

            $this->emit('ProductDeleted_e');
        }

    }
    /*End Destroy*/
}
