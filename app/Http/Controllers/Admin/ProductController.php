<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $presentations = Presentation::all();

        $presents = [];

        foreach($presentations as $p){
                $presents[$p->id] = $p->name .' '. $p->medida;
            }

        return view('admin.products.create', compact('categories', 'tags', 'presents'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|max:25|unique:products',   
            'category_id' => 'required',  
            'presentation_id' => 'required',    
            'tags' => 'required',    
            'details' => 'required',
            'file' => 'required|image'

        ]);

        $continuar = $request->continue;

        $product = Product::create([
            'product' => $request->product,   
            'category_id' => $request->category_id,  
            'presentation_id' => $request->presentation_id,        
            'status_p' => '2',        
            'slug' => Str::slug($request->product),        
            'details' => $request->details,

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

        if($continuar == "on"){

            return redirect()->route('admin.products.create')->with('info', 'El Producto se creó con éxito.');

        }else{
            return redirect()->route('admin.products.index')->with('info', 'El Producto se creó con éxito.');
        }
        

    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $presentations = Presentation::all();

        foreach($presentations as $p){
            $presents[$p->id] = $p->id = $p->name .' '. $p->medida;
        }

        return view('admin.products.edit', compact('product', 'categories', 'tags', 'presents'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product' => "required|max:25|unique:products,product,$product->id",   
            'category_id' => 'required',  
            'presentation_id' => 'required',    
            'tags' => 'required',    
            'details' => 'required',
            'file' => 'required|image'

        ]);

        $continuar = $request->continue;

        $product->update([
            'product' => $request->product,   
            'category_id' => $request->category_id,  
            'presentation_id' => $request->presentation_id,        
            'status_p' => '2',        
            'slug' => Str::slug($request->product),        
            'details' => $request->details,

        ]);

        if($request->file('file')){
            $url = Storage::put('products', $request->file('file'));     
            
            if ($product->image) {
                Storage::delete($product->image->url);

                $product->image->update([
                    'url' => $url
                ]);

            }else{

                $product->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->tags){
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('admin.products.index')->with('info_e', 'El Producto se actualizó con éxito.');
    }


    public function destroy(Product $product)
    {
        //
    }
}
