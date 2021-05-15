<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
