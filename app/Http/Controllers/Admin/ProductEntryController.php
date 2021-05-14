<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Product;
use App\Models\Product_Entry;
use App\Models\Product_Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product-entry.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $products = Product::all();

        foreach($products as $p){
            $product[$p->id] = $p->id = $p->product .' '. $p->presentation->name .' '. $p->presentation->medida;
        }

        return view('admin.product-entry.create', compact('product', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        $continuar = $request->continue;


    		$entrada = new Entry();
            $mytime = Carbon::now();
	    	$entrada->date=$mytime->toDateTimeString();
	    	$entrada->time=$request->time;
	    	$entrada->save();

	    	$product_id=$request->product_id;
	    	$quantity=$request->quantity;

	    	$cont = 0;

	    	while($cont < count($product_id)){

                $products = new Product_Entry();
                $products->product_id=$product_id[$cont];
                $products->entry_id=$entrada->id;
                $products->quantity=$quantity[$cont];
                $products->save();
                $cont=$cont+1;
	    	}

        if($continuar == "on"){

            return redirect()->route('admin.product-entry.create');

        }else{
            return redirect()->route('admin.product-entry.index')->with('info', 'La Entrada se registró con éxito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product_Entry::join('entries as e','e.id','=','entry_id')
                                    ->join('products as p','p.id','=','product_id')
                                    ->join('images as i','i.imageable_id','=','p.id')
                                    ->where('entry_product.id', $id)
                                    ->get();

        return view('admin.product-entry.show',["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function stock()
    {
        return view('admin.product-entry.stock');
    }
}
