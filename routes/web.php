<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('Login.login');
})->name('login');

Route::get('/', 'HomeController@index');
Route::get('solicitar_token', 'SolicitudController@enviarToken')->name('solicitar');
Route::get('solicitud', function () {
    return view('solicitudes.solicitud');
})->name('solicitud');
Route::get('validar_token/{token}/{c_electronico}', 'SolicitudController@validarToken');

Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('ServidoresPublicos', 'ServidorPublicoController')->name('*', 'ServidoresPublicos');
Route::resource('uploadFiles', 'UploadFilesController')->name('*', 'uploadFiles');
Route::resource('RegistrarServidorPublico', 'UploadFilesController')->name('*', 'RegistrarServidorPublico');
Route::get('externo/ServidoresPublicos', 'ServidorPublicoController@create')->name('createServidorPublico');
Route::post('externo/ServidoresPublicos', 'ServidorPublicoController@store')->name('registrarServidorPublico');
Route::post('downloadFile', 'DocumentoController@getFile')->name('downloadFile');
Route::get('validaEmail/{crit}', 'ServidorPublicoController@validaEmail')->name('validaEmail');
Route::get('validaCurp/{crit}', 'ServidorPublicoController@validaCurp')->name('validaCurp');
//Route::get('getRecibos/{id}', 'DocumentosController@getRecibos')->name('getRecibos');
Route::get('getServidores', 'ServidorPublicoController@getServidores')->name('getServidores');
Route::get('validarServidorPublico/{id}', 'ServidorPublicoController@validarRegistro')->name('validarServidorPublico');
Route::get('eliminaServidoresPublicos', 'ServidorPublicoController@deleteServidoresPublicosView')->name('eliminaServidoresPublicosView');
Route::post('eliminaServidoresPublicos', 'ServidorPublicoController@deleteServidoresPublicos')->name('eliminaServidoresPublicos');
Route::get('recibos/busqueda/{tipo_recibo_id}/{anio}/{consecutivo}/{servidor_id}', 'SolicitudController@busqueda');
Route::get('recibos/getFile/{id}', 'DocumentoController@getFile');
