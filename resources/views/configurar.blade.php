@extends('template')
@section('content')
<div class="container-fluid text-center">
  <div class="row">
    <div class="col-12 col-lg-4">
      <br><br>
      <u><h3>Cambiar password</h3></u><br>
      
        <div class="input-group mb-3">
          <input type="password" id="antpassword" name="antpassword" class="form-control" onkeyup="checkpass({{ session()->get('id') }});" placeholder="password anterior">
          <div class="input-group-append">
          <img src="img/eyeclose.png" alt="show" id="showantpass" width="50px" onclick="mostrarantContrasena()">
          </div>
        </div>
        <br>

        <div class="input-group mb-3">
          <input type="password" id="newpass" name="newpass" class="form-control" placeholder="nuevo password">
          <div class="input-group-append">
          <img src="img/eyeclose.png" alt="show" id="shownewpass" width="50px" onclick="mostrarnewContrasena()">
          </div>
        </div>
        <button class="btn btn-primary btn-block" id="btnpass" onclick="changepass()" disabled>Guardar nuevo password</button>

    </div>
    <div class="row separador"></div>
    <div class="col-12 col-lg-4">
      <br><br>
      <u><h3>Accesos Vigentes</h3></u><br>
      @if ($accesos -> isEmpty())
        <h3>Sin accesos vigentes</h3>
      @else
      <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Inicio</th>
            <th scope="col">Fin</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($accesos as $data)
          <tr>
            <td>{{$data->nombre}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->fin}}</td>
            <td>
              <img src="img/trashred.png" width="50px" alt="" onclick="borraracceso(this.id);" class="btn" id={{$data->indexacceso}}></td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <div class="col-12 col-lg-4">
      <br><br>
     <!-- <h3>Autos registrados</h3>-->
      <div class="row">
        <div class="col-8 col-lg-10">
            <u><h3>Autos Registrados</h3></u>
        </div>
        <div class="col-4 col-lg-2">
            <button class="btn btn-warning" data-toggle="modal" data-target="#NuevoAuto">Nuevo</button><br>
        </div>
    </div>
      <br>
       @if ($autos -> isEmpty())
            <h3>Sin autos registrados</h3>
      @else      
      <table class="table table-striped">

        
        <thead>
        <tr>
            <th scope="col">Modelo</th>
            <th scope="col">Color</th>
            <th scope="col">Placas</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
         
          
          @foreach ($autos as $data)
          <tr>
            <td>{{$data->modelo}}</td>
            <td>{{$data->color}}</td>
            <td>{{$data->placas}}</td>
            <td>
              <img src="img/configicon.png" width="50px" alt="" class="btn" id={{$data->id}} onclick="editauto(this.id)"></td>
          </tr>
          @endforeach
          @endif
            
          
        </tbody>
      </table>

    </div>
  </div>

</div>




@endsection

<!-- Nuevo auto-->
<div class="modal fade" id="NuevoAuto" tabindex="-1" aria-labelledby="NuevoAutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Nuevo automovil</h5>
        <span id="ideauto" style="display:none;"></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newcar" method="POST">
          @csrf
          <div class="row">
                <div class="col-12">
                    <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" required><br>
                    <input type="text" name="modelo" class="form-control" id="modelo" placeholder="modelo" required><br>
                    <input type="text" name="color" class="form-control" id="color" placeholder="color" required><br>
                    <input type="text" name="placas" class="form-control" id="placas" placeholder="placas" oninput="this.value = this.value.toUpperCase()" required>
                </div>             
          </div>
        </div>
        <div class="modal-footer" id="">
          <button class="btn btn-info">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
       </form>
    </div>
  </div>
</div>
   <!-- End Nuevo auto--> 

<!-- Editar auto-->
<div class="modal fade" id="editAuto" tabindex="-1" aria-labelledby="editAutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Editar automovil</h5>
        <span id="idautoedit" style="display:none;"></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-12">
                  <input type="text" class="form-control" id="editmarca" placeholder="marca"><br>
                  <input type="text" class="form-control" id="editmodelo" placeholder="modelo"><br>
                  <input type="text" class="form-control" id="editcolor" placeholder="color"><br>
                  <input type="text" class="form-control" id="editplacas" placeholder="placas" oninput="this.value = this.value.toUpperCase()">
              </div>             
        </div>
      </div>
      <div class="modal-footer" id="">
        <button type="button" onclick="resaveauto()" class="btn btn-info">Guardar Cambios</button>
        <button type="button" onclick="deleteauto()" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-secondary" id="closemodaledit" data-dismiss="modal">Cancelar</button>
      </div>
      
    </div>
  </div>
</div>
   <!-- End Editar auto--> 