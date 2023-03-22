@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">NUESTROS PEDIDOS</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid shadow p-3 mb-5 bg-body rounded">
        <form action="" method="GET">
            <div class="row mb-4 mt-4">
                <div class="col-2"></div>
                <div class="col-6 form-group">
                    @csrf
                    <select class="form-control" name="search">
                        <option value="" selected>Todos los pedidos</option>
                        @foreach ($estadopedidos as $estado)
                        <option value="{{$estado->id}}" @if ($estado->id == $search) selected @endif>{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
        <div class="row mb-4">
            <div class="col-12">
                @if (session('datos'))
                    <div class="alert alert-{{session('estilo')}} alert-dismissible mt-4 mb-4" id="mensaje" role="alert">
                        {{session('datos')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table text-center">
                    <thead>
                        <tr class="table-primary">
                            <th>ID</th>
                            <th>FECHA CREACIÓN</th>
                            <th>FECHA ENVIO</th>
                            <th>FECHA ENTREGA</th>
                            <th>ESTADO</th>
                            <th>USUARIO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <th scope="row">{{$pedido->id}}</th>
                                <td>{{$pedido->fechaCreacion}}</td>
                                <td>{{$pedido->fechaEnvio}}</td>
                                <td>{{$pedido->fechaEntrega}}</td>
                                <td>{{$pedido->estadopedido->estado}}</td>
                                <td>{{$pedido->user->name}}</td>
                                <td><a href="{{route('pedidos.edit',$pedido)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-12 justify-content-center">
                {{$pedidos->links()}}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        },2000);
    </script>
@endsection
