@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">CREAR NUEVO EMPLEADO</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('empleados.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Nombre del empleado</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Sueldo del empleado</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control @error('salario') is-invalid @enderror" name="salario" value="{{old('salario')}}">
                                </div>
                            </div>
                            @error('salario')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{old('dni')}}">
                            </div>
                            @error('dni')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Rol</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                    <option selected disabled>Selecciona el rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role_id')
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
            <a href="{{route('empleados.index')}}" class="btn btn-info"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp; Volver</a>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
