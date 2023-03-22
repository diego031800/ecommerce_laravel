@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">REPORTE DE PEDIDOS</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid shadow p-3 mb-5 rounded">
                    <div class="row p-4">
                        <table class="table table-striped text-center">
                            <thead class="" style="background-color: #ff7f28">
                                <tr>
                                    <th>N° Pedido</th>
                                    <th>Fecha de Envio</th>
                                    <th>Fecha de Entrega Esperada</th>
                                    <th>Estado del Pedido</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{$pedido->id}}</td>
                                        <td>{{$pedido->fechaEnvio}}</td>
                                        <td>{{$pedido->fechaEntrega}}</td>
                                        <td>{{$pedido->estadopedido->estado}}</td>
                                        <td>
                                            <a type="button" href="{{route('reporte.pedido', $pedido->id)}}" target="_blank" class="btn btn-outline-danger">
                                                <i class="fas fa-file-pdf"></i> Ver reporte
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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