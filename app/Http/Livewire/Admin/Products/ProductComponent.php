<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Presentation;
use App\Models\Product;
use App\Models\Tag;
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
    public $product_id;
    public $product;
    public $category_id;
    public $presentation_id;
    public $tags;
    public $details;
    public $file;
    public $view='create';
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
        $cat = Category::all();
        $tags = Tag::all();
        $presentations = Presentation::all();

        $products = Product::where('product', 'LIKE', "%{$this->search}%")
                            ->orderBy($this->sort, $this->direcction)
                            ->paginate($this->entries);

        return view('livewire.admin.products.product-component', compact('products', 'cat', 'tags', 'presentations'));
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

    /* Create */
    public function create()
    {
        $this->reset(['product']);
        $this->reset(['category_id']);
        $this->reset(['presentation_id']);
        $this->reset(['tags[]']);
        $this->reset(['details']);
        $this->reset(['file']);
    }

    protected $rules = [
            'product' => 'required|max:25|unique:products',   
            'category_id' => 'required',  
            'presentation_id' => 'required',    
            'tags' => 'required',    
            'details' => 'required',
            'file' => 'required|image'    
    ];

    protected $validationAttributes = [
            'product' => 'Producto',   
            'category_id' => 'Categoría',  
            'presentation_id' => 'Presentación',    
            'tags' => 'Etiqueta',    
            'details' => 'Detalle',
            'file' => 'Imagen'
    ];

    public function save(){
        
        $this->validate();

        $continuar = $request->continue;

        $product = Product::create([
            'product' => $this->product,   
            'category_id' => $this->category_id,  
            'presentation_id' => $this->presentation_id,        
            'status_p' => '2',        
            'slug' => Str::slug($this->product),        
            'details' => $this->details,

        ]);

        if($request->file('file')){
            $url = Storage::put('products', $request->file('file'));     
            
            $product->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags){
            $product->tags()->attach($request->tags);
        }

        $this->reset(['product']);
        $this->reset(['category_id']);
        $this->reset(['presentation_id']);
        $this->reset(['tags[]']);
        $this->reset(['details']);
        $this->reset(['file']);

        $this->emit('render');

        $this->emit('productAdded');
    }
    /* End Create  */

    /* Edit/Update */

    public function edit($id)
    {
        $producto = Product::find($id);

        $this->product_id = $id;
        $this->pruduct = $pruducto->pruduct;
        $this->category_id = $pruducto->category_id;
        $this->presentation_id = $pruducto->presentation_id;
        $this->tags = $pruducto->tags->id;
        $this->details = $pruducto->details;
        $this->file = $pruducto->image->url;
  
    }

    public function update()
    {
        $this->validate([
            'product' => "required|max:25|unique:products,product,$this->product_id",   
            'category_id' => 'required',  
            'presentation_id' => 'required',    
            'tags' => 'required',    
            'details' => 'required',
            'file' => 'required|image'
        ]);

        $producto = Product::find($this->product_id);

        $producto->update([
            'product' => $this->product,   
            'category_id' => $this->category_id,  
            'presentation_id' => $this->presentation_id,        
            'status_p' => '2',        
            'slug' => Str::slug($this->product),        
            'details' => $this->details,
        ]);
        
        if($request->file('file')){
            $url = Storage::put('products', $request->file('file'));     
            
            if ($producto->image) {
                Storage::delete($producto->image->url);

                $producto->image->update([
                    'url' => $url
                ]);

            }else{

                $producto->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($this->tags){
            $producto->tags()->sync($this->tags);
        }

        $this->reset(['product']);
        $this->reset(['category_id']);
        $this->reset(['presentation_id']);
        $this->reset(['tags[]']);
        $this->reset(['details']);
        $this->reset(['file']);
        $this->emit('productEdited');
        
    }
    /* End Edit/Update */
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
