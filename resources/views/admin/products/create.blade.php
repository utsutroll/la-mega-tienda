@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Nuevo Producto</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Menú Principal</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Listado de Productos</a></li>
                    <li class="breadcrumb-item active">Nuevo Producto</li>
                </ol> 
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- Column -->      
    <!-- Validation wizard -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Registrar Producto</h4>
                    <h6 class="card-subtitle">Sigue los pasos para registrar un producto</h6>
                    {!! Form::open(['route' => 'admin.products.store', 'autocomplete' => 'off', 'files' => true]) !!}    
                        
                        @include('admin.products.partials.form')

                        <hr/>

                        <div class="form-group d-flex justify-content-end">
                            <div class="mr-3">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
                            </div>    
                        </div>   
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <link href="{{asset('assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}" type="text/javascript"></script>
    <!-- jQuery file upload -->
    <script src="{{asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">

    $('#liProducts').addClass("active");
    $(".select2").select2();
    $("#presentation_id").select2({
        placeholder: 'Seleccione'
    });
    $('.dropify').dropify({
        messages: {
            default: 'Arrastre y suelte un archivo aquí o haga clic',
            replace: 'Arrastre y suelte un archivo o haga clic para sustituirlo',
            remove: 'Remover',
            error: 'Lo siento, el archivo es demasiado grande'
        }
    });
    @if (session('info'))
        $.toast({
            heading: 'Notificación',
            text: '{{session('info')}}',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
          }); 
    @endif   
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
    });                      
    </script>
@endpush    