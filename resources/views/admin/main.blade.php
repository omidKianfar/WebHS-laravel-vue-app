<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Admin Dashboard</title>
                                        <!-- Bootstrap core CSS -->
        <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body >
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

                        <li class="nav-item ">
                            <h4>
                                <a class="nav-link " href="{{url('/contact')}}">Email Me</a>
                            </h4>
                        </li>

                        <li class="nav-item ">
                            <h4>
                                <a class="nav-link  " href="{{'/products'}}">Products</a>
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
                                        <img class="rounded-circle" src="{{asset('../../../dist/img/user-img/user-empty-image/emptyUserImage.jpg')}}" style="width: 50px;height: 50px;"> <span class="caret"></span>
                                    @else
                                        <img class="rounded-circle" src="{{asset('../../../dist/img/user-img')}}/{{ Auth::user()->profile->image }}" style="width: 50px;height: 50px;"> <span class="caret"></span>
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


        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 bg-info ">
                    <div class=" ">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('/admin/courses')}}">
                                    <strong>Courses</strong>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('/admin/products')}}">
                                    <strong>Products</strong>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('/admin/users')}}">
                                    <strong>Users</strong>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

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
                        <div class="d-flex justify-content-strat flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                            <h2>Dashboard</h2>
                        </div>
                    @yield('content')

                </main>
            </div>
        </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/vendor/holder.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>


    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#dashboardsearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myDashboardTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                });
            });
        });
    </script>
</body>
</html>
