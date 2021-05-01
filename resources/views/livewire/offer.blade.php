<div class="row">
    <div class="col-12">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="fa fa-chevron-left fa-1x"></i>
            </button>
            <div class="carousel__lista"> 
                @foreach ($products as $p)
                <div class="carousel__elemento">
                    <div class="card mb-1 ml-1" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col col-md-4">
                            <img loading="lazy" class="img-fluid" src="{{Storage::url($p->image->url)}}" alt="{{$p->product}}">
                          </div>
                          <div class="col col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{$p->product}}</h5>
                              <span class="badge badge-dark">1$</span>
                              <p class="card-text text-red-600"><small class="text-muted">la Oferta termina en 2 días</small></p>
                            </div>
                          </div>
                        </div>
                      </div>    
                    
                    <p></p>
                </div>
                @endforeach 
            </div>
            <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="fa fa-chevron-right fa-1x"></i>
            </button>
        </div>
        <div role="tablist" class="carousel__indicadores"></div>
    </div>
</div>