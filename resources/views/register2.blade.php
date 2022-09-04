@extends('templatehead')
@section('content')
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
@endsection