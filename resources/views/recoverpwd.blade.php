@extends('templatehead')
@section('content')
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
                <br><button class="btn btn-block btn-warning">Recuperar</button><br><br><br>  
            </form>                 
            </div>
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>  
    </div>
</body>
</html>
@endsection