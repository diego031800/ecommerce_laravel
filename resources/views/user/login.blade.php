<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logueate en la tienda de Don Pepe</title>
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
            <div class="fadeIn first">
                <img src="{{asset('assets/compras.png')}}" style="width: 200px;" id="icon" alt="User Icon" />
            </div>
            <p>Email de prueba: admin@gmail.com</p>
            <p>Contraseña: 123</p>
            <!-- Login Form -->
            <form action="{{route('autentificacion')}}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="submit" class="fadeIn fourth" value="Log In">
                @error('message')
                    <div class="alert alert-secondary" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{route('registrar')}}">Usuario Nuevo?</a>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>