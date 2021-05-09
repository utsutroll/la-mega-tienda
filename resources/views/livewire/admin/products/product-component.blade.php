<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Listado de Productos</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Menú Principal</a></li>
                    <li class="breadcrumb-item active">Listado de Productos</li>
                </ol>
                <a href="{{route('admin.products.create')}}" class="btn btn-success btn-md float-right m-l-15"><i class="fa fa-plus-circle"></i> Nuevo Producto</a> 
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    @include('livewire.admin.products.table')

</div>
