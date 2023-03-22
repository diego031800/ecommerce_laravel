@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">NUESTROS PRODUCTOS</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid shadow p-3 mb-5 bg-body rounded">
        <div class="row mb-2 mt-4">
            <div class="col-10 pl-4">
                
            </div>
            <div class="col-2">
                <a href="{{route('productos.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i> Nuevo Registro</a>
            </div>
        </div>
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
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>STOCK</th>
                            <th>PRECIO</th>
                            <th>PROVEEDOR</th>
                            <th>CATEGORÍA</th>
                            <th colspan=2>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <th scope="row">{{$producto->id}}</th>
                                <td>{{$producto->name}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>S/.{{$producto->precio}}</td>
                                <td>{{$producto->proveedore->name}}</td>
                                <td>{{$producto->category->name}}</td>
                                <td><a href="{{route('productos.edit',$producto)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                                <td>
                                    <form action="{{route('productos.destroy',$producto)}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
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
                {{$productos->links()}}
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
