<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show(Product $product)
    {
        $similares = Product::where('category_id', $product->category_id)
                           ->where('id', '!=', $product->id)
                           ->latest('id')
                           ->take(4)
                           ->get(); 

        return view('products.show', compact('product', 'similares'));
    }

    public function category(Category $category){

        return view('products.category', compact('category'));
    }

    public function tag(Tag $tag){
        $products = $tag->products()->latest('id')->paginate(4);
        
        return view('products.tag', compact('products', 'tag'));
    }
}
