<div>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Listado de Presentaciones</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Menú Principal</a></li>
                    <li class="breadcrumb-item active">Listado de Presentaciones</li>
                </ol>
                <button type="button" class="btn btn-success btn-md float-right m-l-15" data-toggle="modal" data-target="#create-modal" wire:click='create'><i class="fa fa-plus-circle"></i> Nueva de Presentación</button>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    @include("livewire.admin.presentations.$view")

    @include('livewire.admin.presentations.edit')

    @include('livewire.admin.presentations.table')
</div>
