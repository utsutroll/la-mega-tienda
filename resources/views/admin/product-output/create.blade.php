@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Nueva Salida de Producto</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Menú Principal</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.product-entry.index')}}">Listado Salida de Productos</a></li>
                    <li class="breadcrumb-item active">Salida de Producto</li>
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
                    <h4 class="card-title">Registrar Salida de Productos</h4>
                    <h6 class="card-subtitle"></h6>
                    {!! Form::open(['route' => 'admin.product-output.store', 'autocomplete' => 'off', 'files' => true]) !!}    
                        
                        @include('admin.product-output.partials.form')

                        <hr/>

                        <div class="form-group d-flex justify-content-end">
                            <div class="mr-3">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-info guardar']) !!}
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

    <script type="text/javascript">

    $('#liAlmacen').addClass("active");
    $('#liEntry').addClass("active");
    $('#AEntry').addClass("active");
 
    $("#product").select2({
        width: 'resolve',
        height: 'resolve',
        placeholder: 'Seleccione'
    });

    //Alerts Errors
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

    $(document).ready(function(){
            $('#bt_add').click(function(){
                agregar();
            });
        });
        var cont=0;
        $("#product").change(mostrarValores);

        function mostrarValores(){

            datosArticulo=document.getElementById('product').value.split('_');
            $("#pquantity").val(datosArticulo[2]);
        }    

         function agregar(){

            datosArticulo=document.getElementById('product').value.split('_');

            product_id=datosArticulo[0];
            product=$("#product option:selected").text();
            cantidad=$("#pquantity").val();

            if(product_id!="" && cantidad!="" && cantidad>0 ){


                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td colspan="2"><input type="hidden" name="product_id[]" value="'+product_id+'">'+product+'</td><td><input type="number" name="quantity[]" value="'+cantidad+'"></td></tr>';
                cont++;
                limpiar();
                $('#detalles').append(fila);   
                
            }else{

                alert("Hubo un Error, intente de nuevo.");
            }
        }

        function limpiar(){
            $("#pquantity").val("");
        }  

        function eliminar(index){
            $("#fila" + index).remove();
        }         
    </script>
@endpush    