<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Output;
use App\Models\Output_Product;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutputProductController extends Controller
{
    
    public function index()
    {
        return view('admin.product-output.index');
    }

    public function create()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $products = Product::all();

        foreach($products as $p){
            $product[$p->id] = $p->id = $p->product .' '. $p->presentation->name .' '. $p->presentation->medida;
        }

        return view('admin.product-output.create', compact('product', 'date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        $continuar = $request->continue;


    		$output = new Output();
            $mytime = Carbon::now();
	    	$output->date=$mytime->toDateTimeString();
	    	$output->time=$request->time;
	    	$output->save();

	    	$product_id=$request->product_id;
	    	$quantity=$request->quantity;
	    	$observation=$request->observation;

	    	$cont = 0;

	    	while($cont < count($product_id)){

                $products = new Output_Product();
                $products->product_id=$product_id[$cont];
                $products->output_id=$output->id;
                $products->quantity=$quantity[$cont];
                $products->observation=$observation[$cont];
                $products->save();
                $cont=$cont+1;
	    	}

        if($continuar == "on"){

            return redirect()->route('admin.product-output.create');

        }else{
            return redirect()->route('admin.product-output.index')->with('info', 'La Salida se registró con éxito.');
        }
    }

    public function show($id)
    {
        $product = Output_Product::join('outputs as o','o.id','=','output_id')
                                    ->join('products as p','p.id','=','product_id')
                                    ->join('images as i','i.imageable_id','=','p.id')
                                    ->join('presentations as pre','pre.id','=','p.presentation_id')
                                    ->join('categories as ca','ca.id','=','p.category_id')
                                    ->select('p.*', 'e.*', 'output_products.*', 'i.*','pre.name as present', 'pre.medida', 'ca.name as cat')
                                    ->where('output_products.id', $id)
                                    ->get();

        return view('admin.product-output.show',["product" => $product]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
