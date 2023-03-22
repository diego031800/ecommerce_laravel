@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12 text-center">
            <h1>BIENVENIDO A NUESTRO PANEL DE ADMINISTRACIÓN DON PEPE</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <img src="{{asset('img/tienda.jpg')}}" alt="">
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
