@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Column -->      
    @livewire('admin.tags.tags-component')

</div>
@endsection

@push('scripts')
    <!-- This is data table -->
    <script src="{{url('assets/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/node_modules/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script type="text/javascript">
   
    $(document).ready( function() {
        $("#etiqueta").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    }); 
          
    $('#liTags').addClass("active");

    window.livewire.on('tagAdded',()=>{
        $('#create-modal').modal('hide');

        $.toast({
            heading: 'Notificación',
            text: 'La Etiqueta se creó con éxito.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
          });
    });

    window.livewire.on('tagEdited',()=>{
        $('#edit-modal').modal('hide');

        $.toast({
            heading: 'Notificación',
            text: 'La Etiqueta se actualizó con éxito.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
          });
    });
    window.livewire.on('tagDeleted',()=>{

        $.toast({
            heading: 'Notificación',
            text: 'La Etiqueta se eliminó con éxito.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3500, 
            stack: 6
          });
    });
    window.livewire.on('tagDeleted_e',()=>{

        $.toast({
            heading: 'Notificación',
            text: 'La Etiqueta se encuetra asignada a un producto, no puede ser eliminada.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3500, 
            stack: 6
          });
    });

    </script>
@endpush    