<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Automatyco</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>
<body onload="nobackbutton();">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    <img src="{!! asset('images/logoAutomatyco3.png')!!}" width="350">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" hidden>{{ __('Menu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Menu') }}</a>
                        </li>
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>-->
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
<!-------------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ __("Choose a language") }}

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('set_language', ['es'])}}">{{ __("Spanish") }}</a>
                                    <a class="dropdown-item" href="{{route('set_language', ['en'])}}">{{ __("English") }}</a>
                                </div>
                            </li>
<!-------------------------------------------------------------------------------------------------------------------------------------------------->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div style="text-align: center;">
        <p>Av. 5 de Mayo #15 Bod. #8 Colonia San Juan de Ocotan. Tel/Fax: (33) 3120-1000 C.P. 45019, Zapopan, Jalisco</p>
        <p>R.F.C. AMC-030901-P69</p>
    </div>
    @yield('script')
</body>
</html>
