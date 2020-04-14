<?php

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
Route::group(['middleware' => 'auth'], function(){
  Route::group(['middleware' => 'adminUser'], function () {
          Route::get('/admin', function(){
          return view('admin.home');
          })->name('admin');
      });
});

Route::group(['prefix'=>'admin','middleware' => 'auth'], function(){
  Route::group(['middleware' => 'adminUser'], function () {
 
//******************************Rutas para departamentos***********************************
  Route::resource('departamentos','DepartamentosController');

//******************************Rutas para carreras****************************************
  Route::resource('carreras','CarrerasController');

  });
});

Route::get('/', function () {
    return view('home.index');
});

Auth::routes();


//***********************Rutas de Materias Decentes***************************
Route::resource('materiasdocente','MateriasDocenteController');

//***********************Rutas de Apuntes*************************************
Route::resource('apuntes','ApuntesController');
Route::get('subida','ApuntesController@create')->name('subida');
Route::post('subirapunte','ApuntesController@store');
Route::get('historial','ApuntesController@index');

Route::get('vistaDepartamentos','VistaDeptosController@mostrarVistaDptos');
Route::get('vistaCar/{nombre}','VistaCarrerasController@mostrarVistaCarreras');

//***********************Rutas WEB****************************
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('perfil','UsuarioController@datosUsuario')->name('perfil');
Route::post('actualizarperfil', 'UsuarioController@store');

