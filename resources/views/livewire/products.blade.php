<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="p-3 mb-3 bg-white d-flex justify-content-center">
        <div class="form-material flex justify-between">
            <div class="ml-1 input-group flex-2">
                <div class="input-group-prepend">
                    <div class="relative inline-block text-left mr-2" x-data="{ open: false }">
                        <div>
                            <button x-on:click=" open = true " type="button" class="inline-flex justify-center w-full border-t-0 border-b border-l-0 border-r-0 border-gray-200 px-1 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Filtrar por Categoría
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" x-on:click.away=" open = false "
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="z-50 origin-top-right absolute mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            
                            <div class="py-1 overflow-y-auto h-80 sm:h-80 md:h-80 lg:h-90" role="none">
                                @foreach($categories as $c) 
                                <a href="{{route('products.category', $c)}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">{{$c->name}}</a>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" id="search_box" wire:model="search" class="form-control" placeholder="Buscar &hellip;" />
            </div>
            <div class="relative inline-block ml-2 flex-1" x-data="{ open: false }">
                <button type="button" x-on:click=" open = true " class="text-gray-500 group inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none" aria-expanded="false">
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
    @if (count($products) > 0)
    
        <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-3 md:grid-cols-4 md:gap-4 lg:grid-cols-5 lg:gap-4 p-2">  
            @foreach ($products as $p)
            
                <div class="card shadow-sm p-3">
                    <div class="card-body">    
                        <div class="img-pro">    
                            <a href="{{route('products.show', $p)}}"> 
                                <img loading="lazy" class="img-fluid image" src="{{Storage::url($p->image->url)}}" alt="{{$p->product}}"/>
                            </a>
                            <ul class="overlay">
                                @foreach ($p->tags as $t)
                                <li class="tag bg-success rounded-pill">    
                                    <a href="{{route('products.tag', $t)}}">{{$t->name}}</a>
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
                            <a class="text-gray-800" href="{{route('products.show', $p)}}">
                                <h5 class="text-base font-bold mt-2 truncate text-center">
                                    {{$p->product}} 
                                </h5>
                                <h5 class="text-base font-bold text-center">
                                    ({{$p->presentation->name}} {{$p->presentation->medida}})
                                </h5>   
                            </a>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </div>
    
    @elseif (count($products) == 0 & $search !== '')
    <div class="my-4 text-center">
        <h5 class="text-base text-gray-800">No hay Resultado para la Busqueda "{{$search}}"</h5>
    </div>
    @else
    <div class="my-4 text-center">
        <h5 class="text-base text-gray-800">No hay Productos en Stock</h5>
    </div>
    @endif
    <div class="px-4 py-3 justify-self-end sm:px-6">
                    
        {{$products->links()}}

    </div> 
</div>
