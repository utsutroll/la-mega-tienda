<div class="row px-3 m-auto">
    <div class="col-12" id="carrusel">
        <a href="#" class="left-arrow"><i class="fa fa-angle-left fa-3x"></i></a>
        <a href="#" class="right-arrow"><i class="fa fa-angle-right fa-3x"></i></a>
        <h4>Productos en Oferta</h4>
        <div class="carrusel">
            @php
            $n = 0
            @endphp
            @foreach ($products as $p)
            <div class="products md:box-content" id="product_{{$n++}}">
                <div class="img-sli">
                    <img src="{{Storage::url($p->image->url)}}" class="rounded mx-auto d-block" />
                </div>
                
                <div class="nombre">
                    <a href="/product-detail/{{$p->id}}">{{$p->product}}</a>
                </div>
                <span class="badge badge-pill badge-dark">1 $</span> 
            </div>
            @endforeach
            <div class="card" id="product_6">
                <img class="card-img-top img-fluid" src="{{asset('/assets/images/big/img5.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Producto</h4>
                    <span class="badge badge-pill badge-dark">1 $</span>
                    <p class="card-text"><small class="text-muted text-red-700">La oferta termina en 2 días</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
