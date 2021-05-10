<div class="container">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Carrito de Compras</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">Carrito de Compras</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Su carro de la compra ({{Cart::count()}} artículos)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table product-overview">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Información del producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Cart::count() > 0)
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <td width="150"><img src="{{Storage::url($item->model->image->url)}}" alt="{{$item->model->name}}" width="80"></td>
                                    <td width="550">
                                        <h5 class="font-500">{{$item->model->product}}</h5>
                                        <p>{{$item->model->details}}</p>
                                    </td>
                                    <td>{{$item->model->price}}$</td>
                                    <td width="70">
                                    <input type="number" value="{{$item->qty}}" data-max="120" class="form-comtrol w-20">
                                    </td>
                                    <td width="150" align="center" class="font-500">{{number_format(round(($item->qty*$item->model->price),2),2)}}$</td>
                                    <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">El Carrito de Compras está Vacio</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <hr>
                        <a href="{{url('products-checkout')}}"> <button class="btn btn-danger pull-right"><i class="fa fa fa-shopping-cart"></i> Pagar</button></a>
                        <a href="/"> <button class="btn btn-dark btn-outline"><i class="fa fa-arrow-left"></i> Continuar comprando</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumen del carrito</h5>
                    <hr>
                    <small>Precio total</small>
                    <h2>{{Cart::total()}} dólares</h2>
                    <hr>
                    <small>Tasa del día</small>
                    <h4>@foreach ($dollar as $d){{number_format($d->price, 2)}}@endforeach Bs.F</h4>
                    <hr>
                    <small>Precio total</small>
                    <h4>@foreach ($dollar as $d){{number_format(round(($d->price*Cart::total()),2),2)}}@endforeach Bs.F</h4>
                    <hr>
                    <a href="{{url('products-checkout')}}"><button class="btn btn-success">Comprar</button></a>
                    <button class="btn btn-secondary btn-outline">Cancelar</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Para cualquier ayuda</h5>
                    <hr>
                    <h5><i class="ti-mobile"></i> +58-412-5541-056</h5> <small>Por favor, contacte con nosotros si tiene alguna duda.
                </div>
            </div>
        </div>
    </div>
</div>
