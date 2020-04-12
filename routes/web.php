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

//******************************Rutas para carreras****************************************
  Route::resource('materias','MateriasController');

Route::get('carrerasjs/{id}','MateriasController@getCarreras');


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
Route::get('subida','ApuntesController@subida');

//***********************Rutas de Perfil**************************************
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('historial','PaginasController@historial');
Route::get('perfil','PaginasController@perfil');

//***********************Rutas de vista de Apuntes****************************
Route::get('vistaDepartamentos','VistaDeptosController@mostrarVistaDptos');
Route::get('vistaCarreras/{id}','VistaCarrerasController@mostrarVistaCarreras');