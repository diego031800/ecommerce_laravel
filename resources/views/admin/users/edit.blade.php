@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">ASIGNAR ROL A USUARIO</h1>
        </div>
    </div>
@endsection

@section('content')
    @if (session('info'))
        <div class="alert alert-success" id="mensaje">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre: </p>
            <p class="form-control">{{$user->name}}</p>
            <h2>Listado de Roles</h2>
            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div class="form-check form-switch">
                        <label >
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 form-check-input']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-success mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> 
        setTimeout(function () {
            document.querySelector('#mensaje').remove();
        },2000);
    </script>
@endsection
