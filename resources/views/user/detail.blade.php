@extends('layouts.vistaTemp')

@section('title', 'Tiendita de Don Pepe')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="container-fluid shadow p-3 mb-5 rounded">
                    <div class="row p-4">
                        <table class="table table-striped text-center">
                            <thead class="" style="background-color: #ff7f28">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{$detail->name}}</td>
                                        <td>{{$detail->cantidad}}</td>
                                        <td>S/. {{$detail->precio * $detail->cantidad}}</td>
                                        @php
                                            $total = $total + $detail->precio*$detail->cantidad;
                                        @endphp
                                        <td>
                                            <form action="{{route('carrito_producto.destroy', [$detail->producto_id, $carrito])}}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td>S/. {{$total}}</td>
                                    <td>
                                        <a type="button" href="{{route('pedido',$carrito)}}" target="_blank" class="btn btn-success">
                                                <i class="fas fa-cash-register"></i> Comprar
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>
@endsection