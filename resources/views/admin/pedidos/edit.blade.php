@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">EDITAR PEDIDO</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('pedidos.update',$pedido)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Fecha de Entrega</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input type="date" class="form-control @error('fechaEntrega') is-invalid @enderror" name="fechaEntrega" value="{{old('fechaEntrega',$pedido->fechaEntrega)}}">
                                </div>
                            </div>
                            @error('fechaEntrega')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Estado del Pedido</label>
                                <select class="form-control @error('estadopedido_id') is-invalid @enderror" name="estadopedido_id">
                                    <option selected disabled>Selecciona para cambiar estado</option>
                                    @foreach ($estadopedidos as $estado)
                                        <option @if ($pedido->estadopedido_id == $estado->id)
                                            selected
                                        @endif value="{{$estado->id}}">{{$estado->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('estadopedido_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <a href="{{route('pedidos.cancelar')}}" class="mt-3 btn btn-danger"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp; Cancelar</a>
                        </div>
                        <div class="col-4 text-center">
                            <button type="submit" class="mt-3 btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp; Enviar</button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
