<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
body{
	background-image:linear-gradient(rgba(0,0,0,0.5) , rgba(0,0,0,0.5)), url("/img/backg.jpg");
	background-position: center;
	background-size: cover;
	background-repeat: no-repeat;
	height: 100vh;
}
.buttons{
	margin-left: 40%;
	margin-top: 400px;
}

    </style>
</head>
<body>
<!-- 
        <div class="w3-container">
            <div class="w3-bar w3-border w3-light-grey">
                <div class="w3-bar-item">
                    <a href="{{route('volunteerNew')}}">الفرص التطويعة المتاحة</a>
                </div>
                <div class="w3-bar-item">
                    <a href="{{route('volunteerPast')}}">الفرص التطوعية الماضية </a>
                </div>
                <div class="w3-bar-item">
                    <a href="{{route('orgControlPanel')}}">صفحة المنسق  </a>
                </div>
            </div>
        </div> 
        -->

        
        <div id="app">
        <nav class="navbar navbar-expand-md ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto" style="margin: auto">
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{route('volunteerNew')}}">الفرص التطوعية الحالية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{route('volunteerPast')}}">الفرص التطوعية الماضية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{route('orgControlPanel')}}">orgControlPanel</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @auth
                    @if(Auth::user()->roll == 'admin')
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{ route('admin.index') }}">cPanel</a>
                    </li>
                    @endif
                    @endauth
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link NL" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link NL dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <!--            </div>-->
        </nav>

            @yield('content')
        </main>
        <!-- End Footer -->
    </div>
</body>
</html>
