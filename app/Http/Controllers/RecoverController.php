<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RecoverMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Illuminate\Support\Facades\Hash;


class RecoverController extends Controller
{
    public function recover(Request $request){

        $para = $request->recovermail;
        $gettoken = Usuarios::where('correo', $para)->get('remember_token')->first();
        //return $gettoken;
        if(!$gettoken){
            $errormsg = "El correo no existe";
            //return view('recoverpwd')->with('error', "el correo no existe en la base");
            return back()->with('error', 'El correo electronico no existe');
        }else{
            $correo = new RecoverMail($gettoken);
            Mail::to($para)->send($correo);
            return view('newpass', compact('para'));

        }
        
    }

    public function index(){
        return view('recoverpwd');
    }

    public function newpass(Request $request){
        //return $request;
        //$idsesion = session()->get('id');
        $correo = $request->input('correo');
        $newpass = Hash::make($request->input('newpass'));
        $changepass = Usuarios::where('correo',$correo )->update(['password' =>$newpass]); 
        return redirect('index');  
    }
}
