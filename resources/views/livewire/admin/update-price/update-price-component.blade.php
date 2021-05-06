<div>
    <div wire:ignore.self class="modal fade" id="modalUpdatePrice" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePrice" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white font-bold" id="modalUpdatePrice">Actualización de Precio del Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-material d-flex justify-content-center">
                    <div class="col-10 input-group">
                        <select class="form-control mr-2" wire:model="category">
                            <option><i class="icon-filter"></i> Filtrar por Categoría</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach    
                        </select>    
                    
                        <input type="text" id="search_box" wire:model="search" class="form-control" placeholder="Buscar &hellip;" />
                    </div> 
                </div>
                @if(count($products) > 0)
                <ul class="list-group mt-4 list-group-flush">
                    @foreach($products as $p)
                    <li class="list-group-item">
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="">Producto</label><br/>
                                <span class="font-bold mt-3">{{$p->product}}</span>
                            </div>
                            <div class="col-2 text-center">
                                <label for="">Precio actual</label>
                                <span class="font-bold mt-3">{{$p->price}}$</span>
                            </div>
                            <div class="col-6">
                                <label for="">Actualizar Precio</label>
                                <input type="number" wire:model.defer="price" class="form-control">
                                @error('price')
                                    <small class="text-danger">{{$message}}</small>   
                                @enderror
                            </div>
                            <div class="col-2 mt-4">
                                <button wire:click.prevent="update({{$p->id}})" wire:loading.disabled wire:target="update"  class="mt-2 btn btn-info waves-effect waves-light">Actualizar</button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @elseif($search !== '')
                <ul class="list-group mt-4 list-group-flush">
                    <li class="list-group-item">
                        <span>No hay resultados para la busqueda: "{{$search}}"</span>
                    </li>
                    
                </ul>
                @endif  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</div>
