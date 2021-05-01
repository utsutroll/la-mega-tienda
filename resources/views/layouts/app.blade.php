<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('../assets/images/favicon.png')}}">

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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
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
        
    </body>
</html>
