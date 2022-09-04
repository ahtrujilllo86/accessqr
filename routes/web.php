<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\QRCode\QRCodeController;
use App\Http\Controllers\RecoverController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    //return view('welcome');
    return "Hola Mundo";
});

*/

Route::get('/recoverpwd', [RecoverController::class, 'index'])->name('recover.index');
Route::post('/recover', [RecoverController::class, 'recover'])->name('recover.recover');
Route::post('/storenewpass', [RecoverController::class, 'newpass'])->name('recover.newpass');
Route::get('/', [UsuariosController::class, 'index']);
Route::get('/index', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/main', [UsuariosController::class, 'main'])->name('usuarios.main');
Route::post('/login',[UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/login',[UsuariosController::class, 'haslogin'])->name('usuarios.haslogin');
Route::get('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::get('/register',[UsuariosController::class, 'register'])->name('usuarios.register');
Route::post('/register',[UsuariosController::class, 'saveregister'])->name('usuarios.saveregister');
Route::get('/historial',[UsuariosController::class, 'historial'])->name('usuarios.historial');

Route::get('/configurar',[UsuariosController::class, 'configurar'])->name('usuarios.configurar');
Route::post('/saveacceso',[UsuariosController::class, 'saveacceso'])->name('usuarios.saveacceso');

Route::post('/listautos',[UsuariosController::class, 'listautos'])->name('usuarios.listautos');
Route::post('/newcar',[UsuariosController::class, 'newcar'])->name('usuarios.newcar');
Route::get('/qrcode/{indexacceso}', [QRCodeController::class, 'makeqr'])->name('makeqr');
Route::get('/showqr/{indexacceso}', [UsuariosController::class, 'showqr'])->name('showqr');
Route::post('/checkfracc',[UsuariosController::class, 'checkfracc'])->name('usuarios.changepassword');
Route::post('/checktoken',[UsuariosController::class, 'checktoken'])->name('usuarios.checktoken');

Route::get('/owners/insert',[UsuariosController::class, 'newowner'])->name('usuarios.newowner');
Route::post('/owners/insertowner',[UsuariosController::class, 'insertowner'])->name('usuarios.insertowner');
Route::post('/owners/editowner',[UsuariosController::class, 'editowner'])->name('usuarios.editowner');
Route::post('/owners/insertfracc',[UsuariosController::class, 'insertfracc'])->name('usuarios.insertfracc');




//Ajax request list
Route::post('/checkfracc',[UsuariosController::class, 'checkfracc'])->name('usuarios.checkfracc');//reviso owner mail
Route::post('/fillauto',[UsuariosController::class, 'fillauto'])->name('usuarios.fillauto');
Route::post('/deleteacceso',[UsuariosController::class, 'deleteacceso'])->name('usuarios.deleteacceso');
Route::post('/showauto',[UsuariosController::class, 'showauto'])->name('usuarios.showauto');
Route::post('/updatecar',[UsuariosController::class, 'updatecar'])->name('usuarios.updatecar');
Route::post('/deletecar',[UsuariosController::class, 'deletecar'])->name('usuarios.deletecar');
Route::post('/checkpass',[UsuariosController::class, 'checkpass'])->name('usuarios.checkpass');
Route::post('/updatepass',[UsuariosController::class, 'updatepass'])->name('usuarios.updatepass');