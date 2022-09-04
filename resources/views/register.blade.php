@extends('templatehead')
@section('content')
<body>
    <div class="container-fluid maindiv">
        <div class="row">
            <div class="col-12">
            <a href="index"><img src="img/backicon.png" width="64" alt="Go Back" ></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-lg-4 newform">
                <h3>Registro de Usuarios</h3>
               <!-- <div class="row logorow">
                    <img src="img/acceslogo.png" width="320" alt="">
                </div>-->
                <form action="register" method="POST" onkeydown="return event.key != 'Enter';">
                    @csrf
                <br><input type="text" name="idfrac" class="form-control" placeholder="Id de Fraccionamiento" onkeyup="checkfracc(this.value);">
                <div class="row">
                    <div class="col-12" id="registerform" style="display:none;">
                        <br><input type="text" class="form-control" id="fracc" placeholder="Fraccionmaiento" disabled>
                        <br><input name="nombre1" type="text" class="form-control" placeholder="Nombre 1" required>
                        <br><input name="nombre2" type="text" class="form-control" placeholder="Nombre 2">
                        <br><input name="apellidop" type="text" class="form-control" placeholder="Apellido Paterno" required>
                        <br><input name="apellidom" type="text" class="form-control" placeholder="Apellido Materno">
                        <br><input name="correo" type="text" class="form-control" placeholder="Correo --> Este sera su usuario" required>
                        <br><input name="password" type="text" class="form-control" placeholder="password" required>
                        <br><input name="casa" type="text" class="form-control" placeholder="casa" required>
                        <br><input name="token" id="token" type="text" class="form-control" placeholder="token" onkeyup="checktoken(this.value);">
                            <h6 id="tokensi">Token Valido</h6>
                            <h6 id="tokenno">Token No Valido</h6>
                        <br><button id="registerbutton" class="btn btn-block btn-info">Guardar</button>
                    </div>
                </div>

                </form>
            </div>
        </div>  
    </div>
</body>
</html>
@endsection