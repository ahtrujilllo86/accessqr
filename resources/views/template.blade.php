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
    <nav class="navbar navbar-expand-lg navbar-dark barrasuperior">
      <a class="navbar-brand" href="main"><h3>{{ session()->get('nombre') }}</h3></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="main">Inicio</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="historial">Historico</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="configurar">Administrar</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout">Salir</a>
          </li>
        </ul>
      </div>
    </nav>

    
@yield('content')