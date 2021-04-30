<div class="card">
    <div class="card-body">
        <h4 class="card-title">Categorías</h4>
        <h6 class="card-subtitle"></h6>
        <div class="m-t-4">
            <div class="dataTables_length" id="myTable_length">
                <label>Mostrar 
                    <select wire:model="entries"  class="">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> 
                Entradas</label>
            </div>
            <div class="dataTables_filter">
                <label>Buscar:
                    <input type="search" wire:model="search" class="" placeholder="">
                    @if ($search !== '')
                    <button class="btn btn-outline-secondary btn-sm waves-effect waves-light" wire:click="clear" type="button"><span class="btn-label"><i class="fa fa-times"></i></span></button>    
                    @endif
                    
                </label>
            </div>

        </div>
        
        <div class="table-responsive m-t-2">
            @if (count($categories) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th wire:click="order('id')" style="cursor:pointer;">ID
                            {{-- Sort --}}
                            @if ($sort == 'id')
                                @if ($direcction == 'asc')
                                    <i class="fa fa-sort-numeric-asc float-right mt-1"></i>    
                                @else
                                    <i class="fa fa-sort-numeric-desc float-right mt-1"></i>    
                                @endif
                                
                            @else
                                <i class="fa fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th wire:click="order('name')" style="cursor:pointer;">Categoría
                            {{-- Sort --}}
                            @if ($sort == 'name')
                                @if ($direcction == 'asc')
                                    <i class="fa fa-sort-alpha-asc float-right mt-1"></i>    
                                @else
                                    <i class="fa fa-sort-alpha-desc float-right mt-1"></i>    
                                @endif
                                
                            @else
                                <i class="fa fa-sort float-right mt-1"></i>
                            @endif
                            
                        </th>
                        <th colspan="2" class="text-nowrap">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($categories as $c)
                       
                    <tr>
                        <td width="8%">{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>

                        <td width="10px" class="text-nowrap">
                            <button 
                                class="btn btn-info btn-sm"
                                data-toggle="modal" data-target="#edit-modal"
                                wire:click="edit({{$c->id}})">
                                <i class="ti-pencil"></i> 
                                Editar
                            </button>
                        </td>
                        <td width="10px" class="text-nowrap">
                            <button 
                                class="btn btn-danger btn-sm"
                                wire:click="destroy({{$c->id}})">
                                <i class="ti-trash"></i> 
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="float-right">
            {{$categories->links()}}
        </div>
    </div> 
    @elseif (count($categories) == 0 & $search !== '')
        <div class="card-body">
            No hay un resultado para la busqueda "{{$search}}"  
        </div>
        </div>
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th colspan="2" class="text-nowrap">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td colspan="3">No se Encontraron Registros</td>
                </tr>
            </tbody>
        </table> 
        </div>
        </div>      
    @endif 
</div>