@extends('template')
@section('content')

<div class="container-fluid" id="principal">
    <div class="row">
        <div class="col rowimg">
            <img src="img/addiconblue.png" width="60px" alt="Agregar" data-toggle="modal" data-target="#NuevoAcceso">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 col-lg-2 accesos">
            <h3>Mis Accesos</h3>
        </div>
    </div>
    <table class="table table-striped">
      <thead>
      <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Inicio</th>
          <th scope="col">Fin</th>
          <th scope="col">QR</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($accesos as $data)
        <tr>
          <td>{{$data->nombre}}</td>
          <td>{{$data->created_at}}</td>
          <td>{{$data->fin}}</td>
          <td><button onclick="qrgen(this.id)" class="btn btn-warning" id={{$data->indexacceso}}>
            <img src="img/downicon.png" width="20px" alt=""></button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    





</div><!--end container-fluid1-->
<div class="container-fluid" id="acctabla">
    <div class="row justify-content-center accestable">
            <div class="col-12 col-lg-8" id="tableaccesos">

            </div>
    </div>
</div><!--end container-fluid2-->


<!-- Modal nuevo acceso-->
<div class="modal fade modalnew" id="NuevoAcceso" tabindex="-1" aria-labelledby="NuevoAccesoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modtitulo" id="exampleModalLabel">Acceso casa {{ session()->get('casa') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row justify-content-center" >
        <span id="times"></span>
        <div class="col-8" id="qrgen"></div>
      </div>
      
      
      <div class="modal-body" id="modbody">
        <div class="row modcuerpo">
            <div class="col-12">
              <form action="saveacceso" method="POST" onkeydown="return event.key != 'Enter';">
                @csrf
              <h5>Tipo de acceso</h5>
              <select name="tipoacceso" id="tipoacceso" class="form-control">
                <option value="Visita">Visita</option>
                <option value="Empleado">Empleado</option>
                <option value="Proveedor">Proveedor</option>
              </select><br>
              <input type="text" name="nombrevisita" id="nombrevisita" class="form-control" placeholder="Nombre del visitante" required><br>
              <div class="row">
                <div class="col-1">
                    <input type="checkbox" id="checkauto" onclick="showautodiv(this.checked)"> 
                </div>
                <div class="col">
                    <h5>Automovil</h5>
                </div>
              </div>
              <div class="col-12" id="autodatos" style="display: none;">
              <!--test select automovil desde BD-->

              <select id="autobd" onchange="fillauto(this.value)" class="form-control">
              <option value="none">Ingreso Manual</option>
              @foreach ($autos as $auto)
                <option value="{{$auto->id}}">{{$auto->modelo}}&nbsp{{$auto->color}}&nbsp{{$auto->placas}}</option>
              @endforeach

              </select><br>
              <!--test select automovil desde BD-->

                  <input type="text" class="form-control" id="marca" name="marca" placeholder="marca"><br>
                  <input type="text" class="form-control" id="modelo" name="modelo" placeholder="modelo"><br>
                  <input type="text" class="form-control" id="color" name="color" placeholder="color"><br>
                  <input type="text" class="form-control" id="placas" name="placas" placeholder="placas" oninput="this.value = this.value.toUpperCase()">
              </div>
              <!--<br><h5>Inicio</h5><input type="datetime-local" id="inicio" name="dateinicio" class="form-control" required>-->
              <br><h5>El permiso expira:</h5><input type="datetime-local" id="fin" name="datefin" class="form-control" required>              
            </div>
        </div>
      </div>
      <div class="modal-footer" id="modfoot">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <!--<button type="button" onclick="qrgen('2')" class="btn btn-success">QRGen</button>-->
        <button class="btn btn-info">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Modal nuevo acceso-->

<!-- Editar auto-->
<div class="modal fade" id="editAuto" tabindex="-1" aria-labelledby="editAutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Editar automovil</h5>
        <span id="ideauto" style="display:none;"></span>
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


    
</body>
</html>
@endsection
