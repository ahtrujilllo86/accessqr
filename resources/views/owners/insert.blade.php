<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>QR Access</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/qrcode.js"></script>
</head>

<body>
    <div class="container-fluid ">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-6">
                <br><h2>Administracion de correos maestros de usuarios</h2>
                <table class="table table-striped table-sm table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Correo</th>
                        <th scope="col">Users</th>
                        <th scope="col">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($owners as $data)
                      <tr>
                        <form action="editowner" method="POST">
                        @csrf
                        <input type="text" name="idowner" value="{{$data->id}}" style="display: none">
                        <td>{{$data->owner}}</td>
                        <td><input type="number" style="width:40px;" name="usuarios" value="{{$data->usuarios}}"></td>
                        <td><button onclick="" class="btn btn-warning btn-sm">Actualizar</button></td>
                        </form>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
    
            <div class="col-10 col-lg-3 offset-lg-2">
                <form action="insertowner" method="POST">
                @csrf
                  <br><h4>Ingresar nuevo correo</h4><br>
                <input type="text" class="form-control" name="newowner" placeholder="Inserte el correo maestro"><br>
                <input type="text" class="form-control" name="newusuarios" placeholder="Usuarios disponibles"><br>
                <input type="text" class="form-control" name="storedidfrac" placeholder="id de fraccionamiento"><br>
                <input type="text" class="form-control" name="newcasa" placeholder="Numero de casa"><br>
                <button onclick="" class="btn btn-info btn-block">Guardar</button>  
                </form>
                
            </div> 
        </div>


        <div class="row justify-content-center text-center">
          <div class="col-12 col-lg-6">
              <br><h2>Fraccionamientos</h2>
              <table class="table table-striped table-sm table-dark">
                  <thead>
                  <tr>
                      <th scope="col">id</th>
                      <th scope="col">Fraccionamiento</th>
                      <th scope="col">Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($fraccs as $data)
                    <tr>
                      <form action="editowner" method="POST">
                      @csrf
                        <td>{{$data->idfrac}}</td>
                        <td>{{$data->namefrac}}</td>
                      <td><button onclick="" class="btn btn-danger btn-sm">Borrar</button></td>
                      </form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
  
          <div class="col-10 col-lg-3 offset-lg-2">
              <form action="insertfracc" method="POST">
              @csrf
                <br><h4>Nuevo Fraccionamiento</h4>
              <input type="text" class="form-control" name="newidfrac" placeholder="Id del fraccionamiento"><br><br>
              <input type="text" class="form-control" name="newnamefrac" placeholder="Nombre de fraccionamiento"><br><br>
              <button onclick="" class="btn btn-primary btn-block">Guardar</button>  
              </form>
              
          </div> 
      </div>
    </div>
</body>
</html>