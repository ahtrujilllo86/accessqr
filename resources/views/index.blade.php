<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>QR Access</title>
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootcss.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
        <script type="text/javascript" src="{{asset('js/bootjs.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/funciones.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/qrcode.js')}}"></script>
    </head>

<body>
    <div class="container-fluid maindiv">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-4 regform">
                <div class="row logorow">
                    <img src="img/acceslogo.png" width="320" alt="">
                </div>
                <form action="login" method="POST">
                @csrf
                <br><br><input name="email" type="text" class="form-control" placeholder="correo">
                <!--div para input password ver digitos-->
                <br><div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    <div class="input-group-append">
                     <img src="img/eyeclose.png" alt="show" id="showpass" width="50px" onclick="mostrarContrasena()">
                    </div>
                </div><a href="recoverpwd"><h6 id="forgotpass">Olvide mi contraseña</h6></a>
                <!---->
                <br><button class="btn btn-block btn-info">Ingresar</button>
                <br><br><h5>Aun no tiene cuenta?</h5><h5>Registrate <a href="register">Aqui</h5></a>
                </form>
            </div>
            
            
        </div>
    

    </div>
</body>
</html>
