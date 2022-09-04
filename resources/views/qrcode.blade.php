@extends('templatehead')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center text-center">

        <div class="col-12 col-lg-4">
            @if ($queryacc -> isEmpty())
                <h2>Permiso no existe!</h2> <br><br>
                <h2 style="color: red;">Acceso No Autorizado</h2><br>
                <img src="../img/guardstop.png" alt="stop" height="320px">
             @else
                @foreach ($queryacc as $data)
                    @switch($data->vigente)
                    @case('si')
                        <u><h1>{{$data->nombre}}</h1></u>
                        <h5>{{$data->tipo}}</h5>
                        <h2>Casa: {{$data->casa}}</h2>
                        Inicio: {{$data->created_at}}<br>
                        Fin: {{$data->fin}}
                        <h2 style="color: green;">Acceso Autorizado</h2><br>
                        <img src="../img/carlogo.png" alt="carlogo" width="220px" height="120px">
                        
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td class="bg-info">Marca</td>
                                    <td>{{$data->marca}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info">Modelo</td>
                                    <td>{{$data->modelo}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info">Color</td>
                                    <td>{{$data->color}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info">Placas</td>
                                    <td>{{$data->placas}}</td>
                                </tr>
                            </tbody>
                        </table><br>
                        <h3>Autorizado por:</h3>
                        <h2>{{$data->autoriza}}</h2>
                        @break
                    @case('no')
                        <u><h2>Permiso Vencido</h2></u> <br>
                        <h3>{{$data->nombre}}</h3><br>
                        {{$data->inicio}}<br>
                        {{$data->fin}}
                        <h2 style="color: red;">Acceso No Autorizado</h2><br>
                        <img src="../img/guardstop.png" alt="stop" height="320px">
                        @break
                    @case('borrado')
                    <h2>Permiso no existe!</h2> <br><br>
                    <h2 style="color: red;">Acceso No Autorizado</h2><br>
                    <img src="../img/guardstop.png" alt="stop" height="320px">
                    @break
                        
                    @endswitch
                @endforeach

               
         
            @endif
        </div>

    </div>
</div>    



</body>
</html>
@endsection