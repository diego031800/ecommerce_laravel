@extends('layouts.vistaTemp')

@section('title', 'Tiendita de Don Pepe')

@section('content')
        @if (session('error'))
            <div class="container">
                <div class="row mt-8">
                    <div class="alert alert-danger" id="mensaje">
                        <strong>{{session('error')}}</strong>
                    </div>
                </div>
            </div>
        @endif
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset($producto->imagen)}}" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{$producto->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span>S/. {{$producto->precio}}</span>
                        </div>
                        <p class="lead">{{$producto->descripcion}}</p>
                        <div class="d-flex">
                            <form action="{{route('carrito_details.store',$producto)}}" method="POST">
                                @csrf
                                <div class="row d-flex form-group">
                                    <input type="hidden" value="{{$producto->id}}" name="producto_id">
                                    <label for="" class="font-weight-bold">Cantidad:</label>
                                    <input class="form-control text-center me-3 mt-4" name="cantidad" type="number" value="1" style="max-width: 4rem" />
                                    <button class="btn btn-success flex-shrink-0 mt-4" type="submit">
                                        <i class="fas fa-cart-plus"></i>
                                        Añadir al carrito
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Productos Relacionados</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($productos as $p)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{asset($p->imagen)}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$p->name}}</h5>
                                        <!-- Product price-->
                                        S/. {{$p->precio}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center mb-2"><a class="btn btn-warning mt-auto" style="color: aliceblue ;background-color: #ff7f28" href="{{route('carrito_productos.store',$p)}}"><i class="fas fa-cart-plus"></i>  Añadir al carro</a></div>
                                <div class="text-center mt-2"><a class="btn btn-primary mt-auto" href="{{route('user.productos.show',$p)}}"><i class="fas fa-eye"></i>  Ver Producto</a></div>
                            </div>
                            </div>
                        </div>                        
                    @endforeach
                </div>
            </div>
        </section>
@endsection
@section('script')
    <script>
        setTimeout(function () {
            document.querySelector('#mensaje').remove();
        },2000);
    </script>
@endsection