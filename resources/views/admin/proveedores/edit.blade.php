@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">Actualizar Proveedor</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('proveedores.update',$proveedore)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$proveedore->name)}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$proveedore->email)}}">
                            </div>
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input name="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$proveedore->telefono)}}">
                            </div>
                            @error('telefono')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Calle</label>
                                <input type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{old('calle',$proveedore->calle)}}">
                            </div>
                            @error('calle')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Distrito</label>
                                <input name="distrito" type="text" class="form-control @error('distrito') is-invalid @enderror" value="{{old('distrito',$proveedore->distrito)}}">
                            </div>
                            @error('distrito')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Numero</label>
                                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{old('numero',$proveedore->numero)}}">
                            </div>
                            @error('numero')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <select name="regione_id" id="" class="form-control @error('regione_id') is-invalid @enderror">
                                <option value="" selected disabled>Selecciona Región</option>
                                @foreach ($regiones as $regione)
                                    <option value="{{$regione->id}}" @if ($regione->id == $proveedore->regione_id) selected @endif >{{$regione->name}}</option>
                                @endforeach
                            </select>
                            @error('regione_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <a href="{{route('proveedores.cancelar')}}" class="mt-3 btn btn-danger"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp; Cancelar</a>
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
    <script>
    </script>
@endsection
