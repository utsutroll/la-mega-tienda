<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/assets/images/favicon.svg')}}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/assets/node_modules/prism/prism.css')}}">
        <link href="{{url('/assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('/assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/node_modules/glider.js-master/glider.min.css')}}" rel="stylesheet" />
        <link href="{{url('dist/pages/ecommerce.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('dist/css/style-custom.css')}}">
        <!--Toaster Popup message CSS -->
        <link href="{{url('/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    

        <style>
            .notify-m{
                top: -10px;
                right: -1px;
                color: red;
                position: relative;
            }
            .notify-m .heartbit-m{
                position: absolute;
                top: -2px;
                right: -7px;
                height: 25px;
                width: 25px;
                z-index: 10;
                border: 5px solid #e46a76;
                border-radius: 70px;
                -moz-animation: heartbit 1s ease-out;
                -moz-animation-iteration-count: infinite;
                -o-animation: heartbit 1s ease-out;
                -o-animation-iteration-count: infinite;
                -webkit-animation: heartbit 1s ease-out;
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label text-danger">La Mega Tienda Turén</p>
            </div>
        </div>
        <div class="min-h-screen bg-gray-100 m-auto">
            @livewire('navigation')
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="{{url('/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
        <!-- Bootstrap popper Core JavaScript -->
        <script src="{{url('/assets/node_modules/popper/popper.min.js')}}"></script>
        <script src="{{url('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{url('/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/node_modules/prism/prism.js')}}"></script>
        <script src="{{asset('assets/node_modules/glider.js-master/glider.min.js')}}" type="text/javascript"></script>  
        <script src="{{asset('/dist/js/carrusel-app.js')}}" type="text/javascript"></script>  
        <!-- Popup message jquery -->
        <script src="{{url('/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
        <script>
            $(function () {
                $(".preloader").fadeOut();
            });
        </script>
    </body>
</html>
