<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/compras.png')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff7f28">
            <div class="container px-5">
                <a class="navbar-brand" href="{{route('home')}}"> <img src="{{asset('assets/compras.png')}}" style="width: 50px" alt=""> &nbsp;&nbsp;&nbsp; Don Pepe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('home')?'active':''}}" aria-current="page" href="{{route('home')}}">Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if (auth()->check())
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-user"></i>&nbsp;&nbsp;{{auth()->user()->name}}</a>
                            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @can('home.admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.admin')}}">Administrar</a>
                                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endcan
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('verpedidos',auth()->user())}}">Ver pedidos</a>
                            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf 
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @else
                            <li class="nav-item"><a class="btn btn-outline-success" type="button" href="{{route('login')}}"> <i class="fas fa-user-circle"></i> Log In</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="nav-item"><a class="btn btn-outline-primary" type="button" href="{{route('registrar')}}">Registrarme</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif
                    </ul> 
                    <form class="d-flex" action="{{route('carrito.detalles')}}">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="fas fa-shopping-cart"></i>
                            Ir al Carrito
                            @if (auth()->check())
                                @if ($carrito->cantidadProductos() != 0)
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{$carrito->cantidadProductos()}}</span>
                                @endif
                            @endif
                        </button>
                    </form>                        
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        @yield('content')
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        {{-- Owner JS --}}
        @yield('script')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/6764efe8af.js" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    </body>
</html>
