@extends('template')
@section('content')
<div class="container-fluid text-center">
    <h3>Historial de Accesos</h3>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Inicio</th>
            <th scope="col">Fin</th>
            <th scope="col">Vigente</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($historyaccess as $data)
          <tr>
            <td>{{$data->nombre}}</td>
            <td>{{$data->tipo}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->fin}}</td>        
            @if($data->vigente == 'si')
            <td><img src='img/sivigente.png' width='40px'></td>
            @endif
            @if($data->vigente == 'no')
            <td><img src='img/novigente.png' width='40px'></td>
            @endif
            @if($data->vigente == 'borrado')
            <td><img src='img/trash.png' width='40px'></td>
            @endif
                
          </tr>
          @endforeach
        </tbody>
      </table>

</div>




@endsection