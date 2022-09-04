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