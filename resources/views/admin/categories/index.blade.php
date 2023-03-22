@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">LISTA CATEGORIAS</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row mb-4">
            <div class="col-11 pl-4">
                <p style="font-family: 'Gill Sans MT'">Lista de categorías</p>
            </div>
            <div class="col-1">
                <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table text-center">
                    <thead>
                        <tr class="table-success">
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td><a href="{{route('categorias.edit',$category)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
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
                {{$categories->links()}}
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
