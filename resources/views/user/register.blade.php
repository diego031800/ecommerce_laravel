<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate en la tienda de Don Pepe</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/compras.png')}}" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('entrar/login.css')}}">
</head>
<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="fadeIn first" style="margin-bottom: 20px;margin-top: 20px; padding-right: 20px; padding-left: 20px;">
                <span style="font-weight: bolder; font-size: 1.8em; color: #ff7f28">Únete a la Tiendita de Don Pepe</span>
            </div>
            <!-- Login Form -->
            <form action="{{route('registrar.store')}}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="name" placeholder="Nombres" value="{{old('name')}}">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="text" id="login" class="fadeIn second" name="calle" placeholder="Calle" value="{{old('calle')}}">
                @error('calle')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="text" id="login" class="fadeIn second" name="distrito" placeholder="Distrito" value="{{old('distrito')}}">
                @error('distrito')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="text" id="login" class="fadeIn second" name="numero" placeholder="Numero" value="{{old('numero')}}">
                @error('numero')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <select name="regione_id" class="fadeIn second" id="">
                    <option value="" selected disabled>Selecciona una Región</option>
                    @foreach ($regiones as $regione)
                        <option value="{{$regione->id}}">{{$regione->name}}</option>
                    @endforeach
                </select>
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" value="{{old('email')}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="{{old('password')}}">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="submit" class="fadeIn fourth" value="Registrarme">
            </form>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>