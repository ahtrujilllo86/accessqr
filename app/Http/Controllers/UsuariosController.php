<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\User;
use App\Models\Accesos;
use App\Models\Autos;
use App\Models\Owners;
use App\Models\Tokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function index()
    {
        if(session()->get('id')){
            return redirect('/main');
        }else{
            return view('index');
        }
    }
    
    public function login(Request $request)
    { 
        $user = Usuarios::where('correo',$request->input('email'))->first();
        if(!$user || !Hash::check($request->input('password'),$user->password))
        {
            return redirect('/');
        }else{
            $accesos = Usuarios::where('correo',$request->input('email'))->get();
            session(['id'=>$accesos[0]['id']]);
            session(['nombre'=>$accesos[0]['nombre1']." ".$accesos[0]['apellidop']]);
            session(['casa'=>$accesos[0]['casa']]);
            session(['fraccionamiento'=>$accesos[0]['idfrac']]);
            $idsesion = session()->get('id');
            $accesos = DB::table('accesos')->where('vigente', 'si')->where('idusuario', $idsesion)->get();
           return redirect('/main');
        }
    }

    public function haslogin(){
        if(session()->get('id')){
            return redirect('/main');
        }else{
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('nombre');
        session()->forget('casa');
        session()->forget('fraccionamiento');
        session()->flash('msg', 'flash');
        return redirect('/');
    }

    public function register()
    {
        return view('register2');
    }

    public function saveregister(Request $requ)
    {
        $assigntoken = Tokens::first('token');
        $remindusers = $requ->input('remind');
        $remindusers --;
        $user = new Usuarios;
        $user->idfrac=$requ->input('idfrac');
        $user->nombre1=$requ->input('nombre1');
        $user->nombre2=$requ->input('nombre2');
        $user->apellidop=$requ->input('apellidop');
        $user->apellidom=$requ->input('apellidom');
        $user->correo=$requ->input('correo');
        $user->password= Hash::make($requ->input('password'));
        $user->owner = $requ->input('owner');       
        $user->casa=$requ->input('casa');
        $user->remember_token=$assigntoken['token'];
        $user->save(); 
        Owners::where('owner', $requ->input('owner'))->update(['usuarios' => $remindusers]); 
        Tokens::where('token', $assigntoken['token'])->delete();
        return redirect('/');
    }

    public function main()
    {
        if(session()->get('id')){
            $idsesion = session()->get('id');
            $todayDate = date("Y-m-d:h:i:s");
            $novigentes = DB::table('accesos')->where('idusuario', $idsesion )->whereDate('fin', '<=', $todayDate)
            ->update(['vigente' => 'no']);
            $accesos = DB::table('accesos')->where('idusuario', $idsesion )->where('vigente', 'si')->orderBy('id', 'desc')->get();
            $autos = DB::table('autos')->where('iduser', $idsesion)->get();
            return view('main', compact('accesos'), compact('autos'));           
        }else{
            return redirect('/');
        }
    }

    public function historial(){
        if(session()->get('id')){
            $idsesion = session()->get('id');
            $historyaccess = DB::table('accesos')->where('idusuario', $idsesion )->orderBy('id', 'desc')->get();
            return view('historial', compact('historyaccess'));
        }else{
            return redirect('/');
        }   
    }

    //Ajax request list
    public function checkfracc(Request $request){//reviso owner mail      
        $input = $request->input('id');
        $users = Usuarios::join('owners', 'usuarios.owner', '=', 'owners.owner')
        ->where( 'usuarios.owner', $input)
        ->where('owners.owner', $input)
        ->first(['usuarios.idfrac', 'usuarios.casa', 'owners.usuarios']);
        return $users;
    }

    public function fillauto(Request $requestcar){
        $inputcar = $requestcar->input('id');
        $auto = DB::table('autos')->where('id', $inputcar)->get();
        if($auto -> isEmpty()){
            return 'error';
        }else{
            return $auto;
        }
    }

    public function deleteacceso(Request $request){
        $indexacceso = $request->input('id');
        $affected = DB::table('accesos')->where('indexacceso',$indexacceso )->update(['vigente' => 'borrado']);
    }

    public function updatecar(Request $request)
    {
        $idcar = $request->input('autoid');
        $iduser = session()->get('id');
        $newmarca = $request->input('marca');
        $newmodelo = $request->input('modelo');
        $newcolor = $request->input('color');
        $newplacas = $request->input('placas');
        $savedcar = Autos::where('id',$idcar)->update(
            ['marca' => $newmarca, 
            'modelo' => $newmodelo, 
            'color' => $newcolor, 
            'placas' => $newplacas ]
        );
    }

    public function deletecar(Request $request){
        $idcar = $request->input('autoid');
        $deletecar = Autos::where('id', $idcar)->delete();
        return "ok";
    }
    // end Ajax request

    public function configurar()
    {
        if(session()->get('id')){
            $idsesion = session()->get('id');
            $accesos = DB::table('accesos')->where('idusuario', $idsesion )->where('vigente', 'si')->get();
            $autos = DB::table('autos')->where('iduser', $idsesion)->get();
            return view('configurar', compact('accesos'), compact('autos'));  
        }else{
            return redirect('/');
        }             
    }

    public function saveacceso(Request $requ)
    {
        $queryacc = Accesos::all()->last();     
        if(!$queryacc){
            $indacc = 1;
        }else{
          $indacc = $queryacc->indexacceso + 1;
        }
        $idsesion = session()->get('id');
        $fraccionamiento = session()->get('fraccionamiento');
        $casa = session()->get('casa');
        $usuario = session()->get('nombre');
        $newacc = new Accesos;
        $newacc->indexacceso= $indacc;
        $newacc->idusuario=  $idsesion;
        $newacc->idfrac= $fraccionamiento;
        $newacc->tipo=$requ->input('tipoacceso');
        $newacc->nombre=$requ->input('nombrevisita');
        $newacc->marca=$requ->input('marca');
        $newacc->modelo=$requ->input('modelo');
        $newacc->color=$requ->input('color');
        $newacc->placas=$requ->input('placas');     
        $newacc->fin=$requ->input('datefin');
        $newacc->vigente='si';
        $newacc->casa= $casa;
        $newacc->autoriza= $usuario;
        $newacc->save();   
        $nuevoacceso = Accesos::all()->last();//voy a llamar el acceso recien insertado para mostrar los datos en la vista makeqr
        return view('makeqr', compact('nuevoacceso'));
    }

    public function showqr(Request $request, $indexacceso)
    {
        $queryacc = Accesos::where('indexacceso', $indexacceso )->get();
        return view('qrcode', compact('queryacc'));

    }

    public function listautos(Request $request)
    {
        $input = $request->input('id');
        $validatefracc = DB::table('fraccionamientos')->where('idfrac', $input)->get();  
        if($validatefracc -> isEmpty()){
            return 'error';
        }else{
          return $validatefracc;
        }
    }

    public function newcar(Request $request){
        $idsesion = session()->get('id');
        $newcar = new Autos;
        $newcar->iduser=  $idsesion;
        $newcar->marca=$request->input('marca');
        $newcar->modelo=$request->input('modelo');
        $newcar->color=$request->input('color');
        $newcar->placas=$request->input('placas');     
        $newcar->save();  
        return redirect('/configurar'); 
    }

    public function showauto(Request $request){
        $thecar = $request->input('id');
        $editcar = Autos::where('id', $thecar)->get();
        return $editcar;
    }

    public function updatepass(Request $request)
    {
        $idsesion = session()->get('id');
        $newpass = Hash::make($request->input('pass'));
        $affected = Usuarios::where('id',$idsesion )->update(['password' =>$newpass]); 
        return redirect('/logout');         
    }

    public function checkpass(Request $request)
    {
        $oldpass = $request->input('pass');
        $idsesion = session()->get('id');
        $user = Usuarios::where('id',$idsesion)->first();
        if(!$user || !Hash::check($oldpass,$user->password))
        {
            return 'pass not match';
        }else{
            return 'ok';

        }   
    }

    public function checktoken(Request $request)
    {
        $token = $request->input('token');
        $ctoken = Usuarios::where('remember_token', $token)->get(); 
        if($ctoken -> isEmpty()){
            return 'error';
        }else{
            return "ok";
        }


    }

}

