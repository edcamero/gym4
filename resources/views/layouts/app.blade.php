<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.nombre') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.nombre') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    
                    
                    
                    <ul  class="navbar-nav mr-auto">
                    
                    

                    @can('listar-horario')
                        <a class="navbar-brand" href="{{ route('listar-horario') }}">
                            Horario
                        </a> 
                    @endcan

                    @can('listar-tipo-documento')
                        <a class="navbar-brand" href="{{ route('listar-tipo-documento') }}">
                            Tipo Documento
                        </a> 
                    @endcan

                    @can('listar-empleado')
                        <a class="navbar-brand" href="{{ route('listar-empleado') }}">
                            empleados
                        </a> 
                    @endcan

                    @can('guardar-role')
                        <a class="nav-link py-0" href="{{ route('crear-role') }}">
                            crear role
                            </a> 
                        </li>
                    @endcan
                    
                    </ul>
                    

                    
                    


                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navbar-dark text-white">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu nav-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
          
        
        <div class="row justify-content-start">

            @auth
            
                    @include('layouts.menu-vertical')
            
                
            @endauth
            
            <main class="col-9 container  ">
                
                        @yield('content')
                
                
            </main>
        </div>
      </div>
        
    </div>


    
</body>
</html>
