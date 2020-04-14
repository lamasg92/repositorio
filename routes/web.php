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

//******************************Rutas para materias****************************************
  Route::resource('materias','MateriasController');

  Route::get('carrerasjs/{id}','MateriasController@getCarreras');

//******************************Rutas para users****************************************

  Route::resource('users','UsersController');
  Route::get('user/{tipo}','UsersController@index');
  Route::get('usercreate/{tipo}','UsersController@create');
  Route::post('userstore/{tipo}','UsersController@store')->name('users.store');

  });
});

Route::get('/', function () {
    return view('home.index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('perfil','PaginasController@perfil');
  //***********************Rutas de Materias Decentes***************************
  Route::resource('materiasdocente','MateriasDocenteController');

  //***********************Rutas de Apuntes*************************************
  Route::resource('apuntes','ApuntesController');
  Route::get('vistaDepartamentos','VistaDeptosController@mostrarVistaDptos');
  Route::get('vistaCar/{nombre}','VistaCarrerasController@mostrarVistaCarreras');

  Route::group(['middleware' => 'standard'], function () { 
      //******Rutas exclusivas de Docenes ********
    Route::get('subida','ApuntesController@create')->name('subida');
    Route::post('subirapunte','ApuntesController@store');
    Route::get('historial','ApuntesController@index');
  });
});

//***********************Rutas WEB****************************
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*****************Vistas de Ejemplos*********************
Route::get('dpto', 'VistaController@mostrarDptos');
Route::get('dpto/{slug_dpto}', 'VistaController@mostrarCarreras');
Route::get('dpto/{slug_dpto}/carreras', 'VistaController@mostrarCarreras');
Route::get('dpto/{slug_dpto}/carreras/{slug_carrera}', 'VistaController@mostrarMateria');
Route::get('dpto/{slug_dpto}/carreras/{slug_carrera}/materias', 'VistaController@mostrarMateria');
Route::get('dpto/{slug_dpto}/carreras/{slug_carrera}/materias/{slug_materia}', 'VistaController@mostrarApunte');
/*/ //*/