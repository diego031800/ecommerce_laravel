@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">CREAR NUEVA CATEGORÍA</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('categorias.update',$category)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Nombre de la Categoría</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$category->name)}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 text-center">
                            <button type="submit" class="mt-3 btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp; Enviar</button>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <a href="{{route('categorias.index')}}" class="btn btn-info"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp; Volver</a>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
