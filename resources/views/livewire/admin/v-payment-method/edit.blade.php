 <!-- sample modal content -->
 <div wire:ignore.self id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Editar Billetera</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <div wire:loading>
                    <div class="loader">
                        <div class="loader__figure"></div>
                        <p class="loader__label text-red-700">La Mega Tienda Turén</p>
                    </div>
                    <div>
                        <br><br><br><br><br><br><br>
                    </div>
                </div>
                <div wire:loading.remove>
                    <div class="flex">
                        <div class="form-group flex-1">
                            <label for="type" class="control-label">Tipo de Billetera</label>
                            <select class="form-control" wire:model.defer="type">
                                <option value="0">Seleccione</option>
                                <option value="Billetera de Cryoto Monedas">Billetera de Cryoto Monedas</option>
                                <option value="Billetera de Dolar Virtual">Billetera de Dolar Virtual</option>
                            </select>    
                            @error('type')
                                <small class="text-danger">{{$message}}</small>   
                            @enderror
                        </div>
                        <div class="form-group flex-2">
                            <label for="name" class="control-label">Plataforma</label>
                            <input type="text" class="form-control" wire:model.defer="name" placeholder="Ingrese El Nombre de la Plataforma">    
                
                            @error('name')
                                <small class="text-danger">{{$message}}</small>   
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wallet_email" class="control-label">Billetera</label>
                        <input type="text" class="form-control" wire:model.defer="wallet_email" placeholder="Ingrese los Datos de la Billetera">    
            
                        @error('wallet_email')
                            <small class="text-danger">{{$message}}</small>   
                        @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                        <button wire:click.prevent="update()" wire:loading.remove wire:target="update" class="btn btn-info waves-effect waves-light">Editar</button>
                        <button wire:loading wire:target="update" class="btn btn-info waves-effect waves-light">Cargando...</button>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
