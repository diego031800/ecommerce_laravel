@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">LISTA DE USUARIOS</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid shadow p-3 mb-5 bg-body rounded">
        <div class="row mb-4 mt-4">
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
                        <tr class="table-success">
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>CALLE</th>
                            <th>DISTRITO</th>
                            <th>NUMERO</th>
                            <th>REGION</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->calle}}</td>
                                <td>{{$user->distrito}}</td>
                                <td>{{$user->numero}}</td>
                                <td>{{$user->regione->name}}</td>
                                <td><a href="{{route('users.edit',$user)}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a></td>
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
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        setTimeout(
            function()
            {
                document.querySelector('#mensaje').remove();
            },
            2000
        );
    </script>
@endsection
