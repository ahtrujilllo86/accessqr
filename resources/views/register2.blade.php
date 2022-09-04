<!DOCTYPE html>
<html lang="en">
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
            <div class="col-12">
            <a href="index"><img src="img/backicon.png" width="64" alt="Go Back" ></a>
            </div>
            <div class="col-10 col-lg-4 newform">
                <h3>Registro de Usuarios</h3>
               <!-- <div class="row logorow">
                    <img src="img/acceslogo.png" width="320" alt="">
                </div>-->
                
                   <br> <h5>Introduce el correo Maestro</h5>
                 <form action="register" method="POST" onkeydown="return event.key != 'Enter';">
                    @csrf  
                <input type="text" name="owner" class="form-control" placeholder="Correo Maestro" onkeyup="checkfracc(this.value);">
                <div id="divremain" style="display:none;"><h6>Tienes disponibles: <span id="remainusers"></span>
                    <input type="text" name="remind" style="display: none" id="remainusersblind"> usuarios</h6></div>

                
                <div class="row">
                    
                        <div class="col-12" id="registerform" style="display:none;">
                            
                            <br><input type="text" class="form-control"  id="fracc" placeholder="Fraccionmaiento" disabled>
                            <input name ="idfrac" type="text" class="form-control"  id="fracchide" style="display: none">
                            <br><input type="text" class="form-control"  id="casa" placeholder="casa" disabled>
                            <input name="casa" type="text" class="form-control"  id="casahide" placeholder="casa" style="display: none">
                            <br><input name="nombre1" type="text" class="form-control" placeholder="Nombre 1" required>
                            <br><input name="nombre2" type="text" class="form-control" placeholder="Nombre 2">
                            <br><input name="apellidop" type="text" class="form-control" placeholder="Apellido Paterno" required>
                            <br><input name="apellidom" type="text" class="form-control" placeholder="Apellido Materno">
                            <br><input name="correo" type="text" class="form-control" placeholder="Correo --> Este sera su usuario" required>
                            <br><input name="password" type="text" class="form-control" placeholder="password" required>
                            <br><button class="btn btn-block btn-info">Guardar</button>
                        </div>
                    </form>    
                </div>

                
            </div>
        </div>  
    </div>
</body>
</html>