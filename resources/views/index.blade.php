
@extends('templatehead')
@section('content')
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
@endsection