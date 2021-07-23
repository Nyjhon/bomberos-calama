<?php
use App\Http\Controllers\LoginController;
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

Auth::routes();
Route::get('/', 'ContentController@getHome');

//Rutas de autentificación de usuario

Route::get('/ingreso',[LoginController::class, 'getIngreso'])->name('ingreso');
Route::post('/ingreso',[LoginController::class, 'postIngreso'])->name('ingreso');
Route::get('/registro',[LoginController::class, 'getRegistro'])->name('registro');
Route::post('/registro',[LoginController::class, 'postRegistro'])->name('registro');
Route::get('/cerrar',[LoginController::class, 'getCerrar'])->name('cerrar');
Route::get('/recuperar',[LoginController::class, 'getRecuperar'])->name('recuperar');
Route::post('/recuperar',[LoginController::class, 'postRecuperar'])->name('recuperar');
Route::get('/reset',[LoginController::class, 'getReset'])->name('resetear');
Route::post('/reset',[LoginController::class, 'postReset'])->name('resetear');

// modulo del perfil de usuario
Route::get('/perfil/edit', 'PerfilController@getPerfilEdit')->name('perfil_edit');
Route::post('/perfil/edit/avatar', 'PerfilController@postPerfilAvatar')->name('perfil_avatar');
Route::post('/perfil/edit/password', 'PerfilController@postPerfilPassword')->name('perfil_password');
Route::post('/perfil/edit/info', 'PerfilController@postPerfilInfo')->name('perfil_info');