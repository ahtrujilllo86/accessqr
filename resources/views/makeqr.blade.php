@extends('templatehead')
@section('content')
<body>
<div class="container-fluid">
    <div class="row justify-content-center text-center">
        <div class="col-10 col-lg-6">
            <br><h2>Acceso generado para:</h2><br>
            <u><h2>{{$nuevoacceso->nombre}}</h2></u>
            <h5>{{$nuevoacceso->tipo}}</h5><br>
            <h3>El permiso expira:</h3>
            <h5>{{$nuevoacceso->fin}}</h5>
           
            <br><br>
            <button onclick="firstqrgen(this.id)" class="btn btn-block btn-primary" id={{$nuevoacceso->indexacceso}}>Descarga aqui el codigo QR</button>
        </div>
        

    </div>
</div>

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
  
                <select name="autobd" id="autobd" onchange="fillauto(this.value)" class="form-control">
                <option value="none">Ingreso Manual</option>
  
                </select><br>
                <!--test select automovil desde BD-->
  
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="marca"><br>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="modelo"><br>
                    <input type="text" class="form-control" id="color" name="color" placeholder="color"><br>
                    <input type="text" class="form-control" id="placas" name="placas" placeholder="placas" oninput="this.value = this.value.toUpperCase()">
                </div>
                <br><h5>Inicio</h5><input type="datetime-local" id="inicio" name="dateinicio" class="form-control" required>
                <br><h5>Fin</h5><input type="datetime-local" id="fin" name="datefin" class="form-control" required>              
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
</body>
</html>
@endsection