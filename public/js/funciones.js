var timedisplay;
let _token   = $('meta[name="csrf-token"]').attr('content');
var hoster = "http://192.168.137.1/qracc/public/showqr/";


// begin Ajax post
function checkfracc(idfracc){//reviso owner mail
    //console.log("Enviado: " + idfracc);
    $.ajax({
        type: 'POST',
        url: "checkfracc",
        data: {'id': idfracc, '_token': _token}, 
        success: function (response) {
            let disponile = response['usuarios'];
            console.log(response);
            console.log(disponile);
            
            //if(response!='error'){
          /**/  if(disponile == 0){
                document.getElementById("divremain").style.display = "block";
                document.getElementById("remainusers").innerHTML = disponile;
                
            }else if(disponile > 0){
                document.getElementById("registerform").style.display = "block";
                document.getElementById("fracc").value = response['idfrac'];
                document.getElementById("casahide").value = response['casa'];
                document.getElementById("fracchide").value = response['idfrac'];
                document.getElementById("casa").value = response['casa'];
                document.getElementById("divremain").style.display = "block";
                document.getElementById("remainusers").innerHTML = disponile;
                document.getElementById("remainusersblind").value = disponile;

            }
            else{
                document.getElementById("registerform").style.display = "none";
                document.getElementById("divremain").style.display = "none";
                document.getElementById("remainusers").innerHTML = "0";
            }
        },
        error: function (response) {
          console.log('errorPost');
        },
      });       
}

function checktoken(token){
        $.post("checktoken", {'_token': _token, 'token':token}, function(result){
            console.log(result);
            if(result == "ok"){
                document.getElementById("formtoken").style.display = "block";
            }else{
                document.getElementById("formtoken").style.display = "none";
            }
        });
}

function fillauto(idauto){ 
    if(idauto == "none"){
        document.getElementById("marca").value = "";
        document.getElementById("modelo").value = "";
        document.getElementById("color").value = "";
        document.getElementById("placas").value = "";
    }
     $.ajax({
        type: 'POST',
        url: "fillauto",
        data: {'id': idauto, '_token': _token}, 
        success: function (response) {
            if(response!='error'){
                document.getElementById("marca").value = response[0]['marca'];
                document.getElementById("modelo").value = response[0]['modelo'];
                document.getElementById("color").value = response[0]['color'];
                document.getElementById("placas").value = response[0]['placas'];
            }else{
            }
        },
        error: function (response) {
          console.log('errorPost');
        },
      });
}

function borraracceso(idacceso){
    let erase = "Desea borrar este acceso?";
    if (confirm(erase) == true) {
        $.post("deleteacceso", {'_token': _token, 'id':idacceso}, function(result){
            location.reload();
          });
    } else {
        alert("Operacion cancelada...");

    }
}


// end Ajax post

function checkpass(iduser){
    var pastpass = document.getElementById("antpassword").value;
    if(pastpass != ''){
        $.post("checkpass", {'_token': _token, 'pass':pastpass}, function(result){
            if(result == "ok"){
                document.getElementById("btnpass").disabled= false;
            }else{
                document.getElementById("btnpass").disabled= true;
            }
        });
    }else{
        console.log("campo vacio");
    }
}

function changepass(){
    var newpass = document.getElementById("newpass").value;
    //console.log(newpass);
    $.post("updatepass", {'_token': _token, 'pass':newpass}, function(result){
        alert("Password modificado. Inicie sesion...");
        location.reload();
    });
}
function showautodiv(ch){
    if(ch == true){
      document.getElementById("autodatos").style.display = "block";   
    }else{
        document.getElementById("autodatos").style.display = "none"; 
        document.getElementById("marca").value = "";
        document.getElementById("modelo").value = "";
        document.getElementById("color").value = "";
        document.getElementById("placas").value = ""; 
    }   
}

function qrgen(indexacceso){
   $("#NuevoAcceso").modal();
    //document.getElementById("times").style.display = "block"
    document.getElementById("qrgen").innerHTML = "";
    document.getElementById("modbody").innerHTML = "";
    document.getElementById("modfoot").innerHTML = '<button type="button" onclick="downqr()" class="btn btn-block btn-info">Guardar QR</button>';
   // document.getElementById("modfoot").innerHTML = '';

    var qrcode = new QRCode("qrgen");
    //qrcode.makeCode("http://192.168.1.91/qracc/public/showqr/" + indexacceso);
    qrcode.makeCode(hoster + indexacceso);

    //document.getElementById("spantimes").innerHTML = timedisplay;
}

function downqr(){

    var canvas = document.getElementById("canvasqr");
    var img    = canvas.toDataURL("image/png");
    //var ctx = canvas.getContext("2d");
    //ctx.font = "12px Arial";
    //ctx.fillText(timedisplay,50,10);
    //const createspan = document.createElement('p');
    //createspan.innerHTML= timedisplay;
    const createEl = document.createElement('a');
    createEl.href = img;
    var filename = Math.floor(Math.random() * 100000000);
    createEl.download = filename + ".png";
    //createEl.download = "QRAccess.png";
    createEl.click();
    createEl.remove();
    location.reload();

}

function firstqrgen(indexacceso){
    $("#NuevoAcceso").modal();
     //document.getElementById("times").style.display = "block"
     document.getElementById("qrgen").innerHTML = "";
     document.getElementById("modbody").innerHTML = "";
     document.getElementById("modfoot").innerHTML = '<button type="button" onclick="firstdownqr()" class="btn btn-block btn-info">Guardar QR</button>';
    // document.getElementById("modfoot").innerHTML = '';
 
     var qrcode = new QRCode("qrgen");
     //qrcode.makeCode("http://192.168.1.91/qracc/public/showqr/" + indexacceso);
     qrcode.makeCode(hoster + indexacceso);

     //document.getElementById("spantimes").innerHTML = timedisplay;
 }
 
 function firstdownqr(){
 
     var canvas = document.getElementById("canvasqr");
     var img    = canvas.toDataURL("image/png");
     const createEl = document.createElement('a');
     createEl.href = img;
     var filename = Math.floor(Math.random() * 100000000);
     createEl.download = filename + ".png";
     createEl.click();
     createEl.remove();
     var url = "../public/main";
     location.href = url;
 
 }

function editauto(idauto){
    $("#editAuto").modal();
    $.post("showauto", {'_token': _token, 'id':idauto}, function(result){       
           if(result){
            document.getElementById("idautoedit").innerHTML = result[0]['id'];
            document.getElementById("editmarca").value = result[0]['marca'];
            document.getElementById("editmodelo").value = result[0]['modelo'];
            document.getElementById("editcolor").value = result[0]['color'];
            document.getElementById("editplacas").value = result[0]['placas'];           
           } 
    });

}

function resaveauto(){
    let update = "Modificar datos de este Automovil?";
    if (confirm(update) == true) {
        var autoid = document.getElementById("idautoedit").innerHTML;
        var marca = document.getElementById("editmarca").value;
        var modelo = document.getElementById("editmodelo").value;
        var color = document.getElementById("editcolor").value;
        var placas = document.getElementById("editplacas").value;
        $('#closemodaledit').trigger('click');
        $.post("updatecar", {'_token': _token, autoid: autoid,marca: marca,modelo: modelo,
            color: color,placas: placas},function(result){
            location.reload();
         });   
    } else {
        alert("Operacion cancelada...");
        $('#closemodaledit').trigger('click');
    }
}

function deleteauto(){
    let erase = "Desea borrar este Automovil?";
    if (confirm(erase) == true) {
        var autoid = document.getElementById("idautoedit").innerHTML;
        $('#closemodaledit').trigger('click');  
        $.post("deletecar", {'_token': _token, autoid: autoid},function(result){
            location.reload();
         });
    } else {
        alert("Operacion cancelada...");
        $('#closemodaledit').trigger('click');
    }
}

function mostrarContrasena(){
    var tipo = document.getElementById("password");
    var ruta = document.getElementById("showpass");
    
    if(tipo.type == "password"){
        tipo.type = "text";
        ruta.src = "img/eyeopen.png";
    }else{
        tipo.type = "password";
        
        ruta.src = "img/eyeclose.png";
    }
}



function mostrarnewContrasena(){
    var newtipo = document.getElementById("newpass");
    var newruta = document.getElementById("shownewpass");
    
    if(newtipo.type == "password"){
        newtipo.type = "text";
        newruta.src = "img/eyeopen.png";
    }else{
        newtipo.type = "password";
        
        newruta.src = "img/eyeclose.png";
    }
}

function mostrarantContrasena(){
    var anttipo = document.getElementById("antpassword");
    var antruta = document.getElementById("showantpass");
    
    if(anttipo.type == "password"){
        anttipo.type = "text";
        antruta.src = "img/eyeopen.png";
    }else{
        anttipo.type = "password";
        
        antruta.src = "img/eyeclose.png";
    }
}

function checkmail(){
    var correo = document.getElementById("mymail").value;
    $.post("verifymail.php", {correo: correo}, function(result){
    
        if(result == "ok"){
            document.getElementById("mytoken").style.display= "block";
            document.getElementById("textoguia").innerHTML= "Introduce el token que te enviamos cuando te registraste";
        }else{
            document.getElementById("mytoken").style.display= "none";
            document.getElementById("textoguia").innerHTML= "Introduce un correo electronico valido";
        }
        
    });
}

function verifytoken(){
    var token = document.getElementById("mytoken").value;
    var correo = document.getElementById("mymail").value;
    $.post("verifytoken.php", {token: token, correo: correo}, function(result){
    
        if(result == "si"){
            document.getElementById("camposnewpass").style.display= "block";
            document.getElementById("textoguia").innerHTML= "Introduce tu nueva contraseña";
        }else{
            document.getElementById("camposnewpass").style.display= "none";
            document.getElementById("textoguia").innerHTML= "Introduce el token que te enviamos cuando te registraste";
        }
        
    });
}
