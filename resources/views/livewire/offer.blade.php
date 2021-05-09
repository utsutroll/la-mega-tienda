<div class="col-12 mb-4">
  <div class="carousel__contenedor">
    <button aria-label="Anterior" class="carousel__anterior">
      <i class="fa fa-chevron-left fa-2x"></i>
    </button>
    <div class="carousel__lista"> 
      @foreach ($products as $p)
      <div class="carousel__elemento">
        <div class="card mb-1 ml-1" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col col-md-4 contenedor-img">
              <img loading="lazy" class="img-fluid" src="{{Storage::url($p->image->url)}}" alt="{{$p->product}}">
            </div>
            <div class="col col-md-8">
              <div class="card-body">
                <span class="card-title text-lg font-black">{{$p->product}}</span><br/>
                <div class="badge bg-red-500 text-white">1$</div><br/>
                <span class="text-xs text-red-600 opacity-50">la Oferta termina en 2 días</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach 
    </div>
    <button aria-label="Siguiente" class="carousel__siguiente">
      <i class="fa fa-chevron-right fa-2x"></i>
    </button>
  </div>
  <div role="tablist" class="carousel__indicadores"></div>
</div>
