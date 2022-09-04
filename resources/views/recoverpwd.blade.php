<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>QR Access</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       
        <link rel="stylesheet" type="text/css" href="../public/css/estilos.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../public/js/funciones.js"></script>
        <script type="text/javascript" src="../public/js/qrcode.js"></script>
    </head>
<body>
    <div class="container-fluid maindivforgot">
        <div class="row justify-content-center">
            <div class="col-12">
            <a href="index"><img src="img/backicon.png" width="64" alt="Go Back" ></a>
            </div>
            
            <div class="col-10 col-lg-4 text-center">
            <form action="recover" method="POST">
             @csrf 
                <br><br><h3>Recuperar password</h3>                           
                <br><input name="recovermail" type="text" class="form-control" placeholder="Correo de recuperacion" required>
                <br><button class="btn btn-block btn-warning">Recuperar</button>  
            </form>                 
            </div>
            
        </div>  
    </div>
</body>
</html>