<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="p-3 mb-3 bg-white d-flex justify-content-center">
        <div class="form-material row">
            <div class="col-9 ml-3 input-group">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-white dropdown-toggle mr-1 border-secondary border-top-0 border-left-0 border-right-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-filter"></i> Filtrar por
                    </button>
                    <div class="dropdown-menu">
                        <div class="dropdown-item disabled">Categorías</div>
                            @foreach ($categories as $ca)
                            
                                <div class="dropdown-item checkbox text-gray-800">
                                    <label><input type="checkbox" wire:model="category" id="{{$ca->id}}" value="{{$ca->id}}"> {{$ca->name}}</label>
                                </div>
                            
                            @endforeach
                        </ul>
                    </div>
                </div>
                <input type="text" id="search_box" wire:model="search" class="form-control" placeholder="Buscar &hellip;" />
            </div>
            <div class="relative inline-block ml-2 col-2" x-data="{ open: false }">
                <button type="button" x-on:click=" open = true " class="text-gray-500 group inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                    <svg class="text-gray-400 group-hover:text-gray-500 h-7 w-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                        <path d="M21.822,7.431C21.635,7.161,21.328,7,21,7H7.333L6.179,4.23C5.867,3.482,5.143,3,4.333,3H2v2h2.333l4.744,11.385 C9.232,16.757,9.596,17,10,17h8c0.417,0,0.79-0.259,0.937-0.648l3-8C22.052,8.044,22.009,7.7,21.822,7.431z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle>
                    </svg>
                    @if(Cart::count() > 0)
                    <div class="notify-m"> <span class="heartbit-m"></span>{{Cart::count()}}</div>
                    @endif
                </button>

                <div x-show="open" x-on:click.away=" open = false " class="origin-top-right z-10 absolute right-0 mt-2 px-2 w-screen max-w-md sm:px-0 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="mt-2">
                        <p class="text-base font-bold text-center text-gray-900">
                            Su Carrito de Compras
                        </p>    
                    </div>
                    <div class="relative grid gap-6 bg-white px-3 py-3 sm:gap-8 sm:p-8 overflow-y-auto h-56">
                        @if(Cart::count() > 0)
                        @foreach(Cart::content() as $item)
                        <div class="p-3 flex items-start rounded-lg hover:bg-gray-100">
                            <div class="box-border h-32 w-32 p-2 border-2 flex-1">
                                <img class="w-30 h-30 pt-2" src="{{Storage::url($item->model->image->url)}}" alt="{{$item->model->name}}">
                            </div>
                            <div class="ml-5 justify-center flex-1">
                                <p class="text-base font-bold text-gray-900">
                                    {{$item->model->product}}
                                </p>
                                <div class="justify-center flex">
                                    <a href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" class="w-5 flex items-center justify-center bg-gray-300 hover:bg-red-600 hover:text-white"><i class="ti-minus"></i></a>    
                                    <input type="text" value="{{$item->qty}}" disabled data-max="120" pattern="[0-9]" class="form-comtrol w-11">
                                    <a href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" class=" w-5 flex items-center justify-center bg-gray-300 hover:bg-red-600 hover:text-white"><i class="ti-plus"></i></a>
                                </div>
                                <p class="mt-2 text-center text-sm font-bold text-gray-700">
                                    {{$item->subtotal}}$
                                </p>
                            </div>
                            <div class="box-border pl-5 py-5 flex-1">
                                <button type="button" class="" wire:click.prevent="destroy('{{$item->rowId}}')">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M6 7C5.447 7 5 7 5 7v13c0 1.104.896 2 2 2h10c1.104 0 2-.896 2-2V7c0 0-.447 0-1 0H6zM16.618 4L15 2 9 2 7.382 4 3 4 3 6 8 6 16 6 21 6 21 4z"></path></svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-base font-bold text-center text-gray-900">
                            Carrito de compras vacio
                        </p>
                        @endif    
                    </div>
                    <div class="px-3 py-5 bg-gray-20 sm:px-4 sm:py-8">
                        <div class="p-3 flex justify-between">
                            <span class="text-gray-800 text-lg font-bold">Total: </span>
                            <span class="text-gray-800 text-lg font-bold">{{Cart::total()-Cart::tax()}}$</span>
                        </div>
                        <div class="p-3 flex justify-between">
                            <span class="text-gray-800 text-lg">Tasa del día:</span>
                            <span class="text-gray-800 text-lg">@foreach ($dollar as $d){{number_format($d->price, 2)}}@endforeach Bs.F</span>
                        </div>
                        <div class="p-3 flex justify-between">
                            <span class="text-gray-800 text-lg">Referencia:</span>
                            <span class="text-gray-800 text-lg">@foreach ($dollar as $d){{number_format(round(($d->price*Cart::total()),2),2)}}@endforeach Bs.F</span>
                        </div>
                        <div class="mt-2 flex text-md">
                            <a href="{{route('products.shopping-cart')}}" class="flex-1 rounded-lg border border-gray-800 shadow-md p-2 ml-2 text-gray-800 hover:bg-red-600 hover:text-white text-base text-center max-h-10">Ver Carrito</a>
                            <a href="javascript:void(0)" class="flex-1 rounded-lg border border-gray-800 shadow-md p-2 ml-2 text-gray-800 hover:bg-red-600 hover:text-white text-base text-center max-h-10">Pagar</a>
                            <a href="javascript:void(0)" wire:click.prevent="destroyAll()" class="flex-1 rounded-lg border border-gray-800 shadow-md p-2 xs:p-1 xs:text-xs ml-2 text-gray-800 hover:bg-red-600 hover:text-white text-base text-center max-h-10">Vaciar Carrito</a>
                        </div>
                    </div>
                </div>
            </div>                
        </div>  
    </div>                

    <!-- Column -->
    @livewire('offer')
    <!-- Column -->
    <div class="px-3">
        <div class="row">
            @foreach ($products as $p)
            <div class="col-6 col-md-4 col-sm-6 as-pro-col">
                <div class="card shadow-sm p-3">
                    <div class="card-body">    
                        <div class="img-pro">    
                            <a href="/product-detail/{{$p->id}}"> 
                                <img loading="lazy" class="img-fluid image" src="{{Storage::url($p->image->url)}}">
                            </a>
                            <ul class="overlay">
                                @foreach ($p->tags as $t)
                                <li class="tag bg-success rounded-pill">    
                                    <a href="/tags/{{$t->id}}">{{$t->name}}</a>
                                </li>    
                                @endforeach
                            </ul>
                            <ul class="pro-img-overlay">
                                <li class="bt">
                                    <a href="javascript:void(0)" class="bg-success"><i class="fa fa-heart"></i></a>
                                </li>
                                <li class="bt"> 
                                    <a href="javascript:void(0)" class="bg-success" wire:click.prevent="store({{$p->id}}, '{{$p->product}}', {{$p->price}})"><i class="ti-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>    
                        
                        <div class="product-text">
                            <span class="pro-price bg-dark">
                                <div class="tooltip-ex"><strong>{{$p->price}}$</strong><br>
                                    <span class="tooltip-ex-text tooltip-ex-top">@foreach ($dollar as $d){{number_format($d->price*$p->price, 2)}}@endforeach Bs.F</span>
                                </div>
                                    
                            </span>
                            <h5 class="card-title m-b-0">{{$p->product}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> 
</div>
