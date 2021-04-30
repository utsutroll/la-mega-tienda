<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-titles d-flex justify-content-center">
        <div class="form-material">
            <div class="input-group mb3">
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
                                <img class="img-fluid image" src="{{Storage::url($p->image->url)}}">
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
                                    <a href="javascript:void(0)" class="bg-success"><i class="ti-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>    
                        
                        <div class="product-text">
                            <span class="pro-price bg-dark">
                                <div class="tooltip-ex"><strong>1$</strong><br>
                                    <span class="tooltip-ex-text tooltip-ex-top">@foreach ($dollar as $d){{$d->price*1}}@endforeach Bs.F</span>
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
