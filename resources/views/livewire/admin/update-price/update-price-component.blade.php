<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Actualizar Precio de Productos</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Menú Principal</a></li>
                    <li class="breadcrumb-item active">Actualizar Precio de Productos</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="form-group">
        <select wire:model="category" id="" class="form-control">
        <option>Seleccione</option>
        @foreach($categories as $c)
        <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="list-group"></div>

</div>
