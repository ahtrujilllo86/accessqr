@extends('templatehead')
@section('content')
<body>
    <div class="container-fluid maindivforgot">
        <div class="row justify-content-center">
            <div class="col-12">
            <a href="index"><img src="img/backicon.png" width="64" alt="Go Back" ></a>
            </div>
            
            <div class="col-10 col-lg-4 text-center">
            <form action="storenewpass" method="POST">
             @csrf 
                <br><br><h3>Para cotinuar ingrese el Token recibido por correo</h3>
                    <input name="correo" type="text" style="display: none" value="{{$para}}">
                <br><input name="token" id="token" type="text" class="form-control" placeholder="token" onkeyup="checktoken(this.value);" required>
                <div id="formtoken" style="display: none">
                   <br><input name="newpass" id="newpass" type="text" class="form-control" placeholder="Introduzca su nueva contraseña" required>
                <br><button class="btn btn-block btn-warning">Recuperar</button>   
                </div>                          
                
            </form>                 
            </div>
            
        </div>  
    </div>
</body>
</html>
@endsection