<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

                        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Web Home Studio</title>

                        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

                            <!-- Links -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../dist/css/albom.css">
    <link rel="stylesheet" href="../../../dist/css/style.css">

                            <!-- Styles -->
</head>
<body>
    <div id="app">
        @include('content.about')
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                    <h2>WebHS</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item " >
                            <h4>
                                <a class   ="nav-link  " type="button" data-toggle="collapse" href="#navbarHeader">
                                    About
                                </a>
                            </h4>
                        </li>
                        {{-- <li class="nav-item ">
                            <h4>
                                <a class="nav-link " href="{{url('/contact')}}">
                                    Email Me
                                </a>
                            </h4>
                        </li> --}}
                        <li class="nav-item ">
                            <h4>
                                <a class="nav-link  " href="{{url('/products')}}">
                                    Products
                                </a>
                            </h4>
                        </li>
                        <li class="nav-item ">
                            <h4>
                                <a class="nav-link  " href="{{url('/allCourse')}}">
                                    Courses
                                </a>
                            </h4>
                        </li>
                    </ul>

                                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->profile->image =='')
                                        <img class="rounded-circle" src="https://www.google.com/search?q=empty+user+image&client=opera&hs=xii&sxsrf=ALeKk00zJYb-SGnN58N5sVrP7WA-Co4Zdg:1625554691225&tbm=isch&source=iu&ictx=1&fir=WjM27IN1p2VJzM%252CMG0JGB0B8kPXNM%252C_&vet=1&usg=AI4_-kRehjVeIRopSPs-G5oXRAcdS6lLTQ&sa=X&ved=2ahUKEwjSsLuP783xAhXZilwKHS4nADwQ9QF6BAgNEAE#imgrc=WjM27IN1p2VJzM" style="width: 50px;height: 50px;"> <span class="caret"></span>
                                    @else
                                        <img class="rounded-circle" src="{{asset('uploads/user-img')}}/{{ Auth::user()->profile->image }}" style="width: 50px;height: 50px;"> <span class="caret"></span>
                                    @endif
                                    {{ Auth::user()->profile->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->type=='admin')
                                        <a class="dropdown-item" href="{{ url('/admin') }}">
                                            Admin Panel
                                        </a>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            Profile
                                        </a>

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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach (['error','success','danger','warning'] as $fleshMsg)
                @if(session()->has($fleshMsg))
                    <pre class="alert alert-{{$fleshMsg}}">{{session()->get($fleshMsg)}}</pre>
                @endif
            @endforeach
            @yield('content')
        </main>
    </div>
</body>
</html>
