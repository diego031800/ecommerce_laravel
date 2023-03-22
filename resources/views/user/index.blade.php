@extends('layouts.vistaTemp')

@section('title', 'Tiendita de Don Pepe')

@section('content')
    @if (session('error'))
        <div class="container">
            <div class="row mt-8">
                <div class="alert alert-warning" id="mensaje">
                    <strong>{{session('error')}}</strong>
                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid">
        <!-- Heading Row Slider-->
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" style="width: 1200px;height: 600px;" src="{{asset('img/carrito-don-pepe.jpg')}}" alt="..." /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light">En la tienda de Don Pepe ...</h1>
                            <p>Podrás hacer tus compras como si estuvieras en el supermercado, puedes escoger la cantidad de productos que necesitas para tu hogar y hacer tu compra de la misma manera que lo haces habitualmente. Entra y disfruta haciendo tus compras ! ... </p>
                            <a class="btn btn-success" href="#vamos"><i class="fas fa-arrow-down"></i> &nbsp; Vamos allá!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" style="width: 1200px;height: 600px;" src="{{asset('img/products.jpg')}}" alt="..." /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light">Tenemos de todo!... ¿Qué esperas?</h1>
                            <p>Desde abarrotes hasta los productos que necesitas en tu cocina como frutas y verduras, si quieres conseguir descuentos comienza comprando aquí! ...</p>
                            <a class="btn btn-success" href="#vamos"><i class="fas fa-arrow-down"></i> &nbsp; A comprar!</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>    
    </div>
    {{-- Seccion de Productos --}}
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4" id="vamos">Nuestros Productos</h2>
            <div class="row pb-2">
                <div class="col-12">
                    <p class="fw-bolder">Filtrar por: </p>
                </div>
            </div>
            <form action="">
                <div class="row pb-5 px-3 form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <select name="search" id="idcategory" class="form-control">
                            <option selected>Todos los productos</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $search) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($productos as $producto)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset($producto->imagen)}}" style="width: 450; height: 300;" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$producto->name}}</h5>
                                    <!-- Product price-->
                                    S/. {{$producto->precio}}
                                </div>
                            </div>
                                <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center mb-2"><a class="btn btn-warning mt-auto" style="color: aliceblue ;background-color: #ff7f28" href="{{route('carrito_productos.store',$producto)}}"><i class="fas fa-cart-plus"></i>  Añadir al carro</a></div>
                                <div class="text-center mt-2"><a class="btn btn-primary mt-auto" href="{{route('user.productos.show',$producto)}}"><i class="fas fa-eye"></i>  Ver Producto</a></div>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
        <div class="container pb-5">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-2">
                    {{$productos->links()}}
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        },2000);
    </script>
@endsection