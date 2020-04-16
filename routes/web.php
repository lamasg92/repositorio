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
Auth::routes();

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
  Route::get('/departamentos/{id}/desable','DepartamentosController@desable')->name('departamentos.desable');
  Route::get('/departamentos/{id}/enable','DepartamentosController@enable')->name('departamentos.enable');

//******************************Rutas para carreras****************************************
  Route::resource('carreras','CarrerasController');
  Route::get('/carreras/{id}/desable','CarrerasController@desable')->name('carreras.desable');
  Route::get('/carreras/{id}/enable','CarrerasController@enable')->name('carreras.enable');

//******************************Rutas para materias****************************************
  Route::resource('materias','MateriasController');
  Route::get('/materias/{id}/desable','MateriasController@desable')->name('materias.desable');
  Route::get('/materias/{id}/enable','MateriasController@enable')->name('materias.enable');

  Route::get('carrerasjs/{id}','MateriasController@getCarreras');

//******************************Rutas para users****************************************

  Route::resource('users','UsersController');
  Route::get('user/{tipo}','UsersController@index')->name('users.index');
  Route::get('usercreate/{tipo}','UsersController@create')->name('users.create');
  Route::get('useredit/{id}/{tipo}','UsersController@edit')->name('users.edit');
  Route::patch('userupdate/{id}/{tipo}','UsersController@update')->name('users.update');
  Route::post('userstore/{tipo}','UsersController@store')->name('users.store');
  Route::get('/users/{id}/desable','UsersController@desable')->name('users.desable');
  Route::get('/userss/{id}/enable','UsersController@enable')->name('users.enable');

  });
});

Route::get('/', function () {
    return view('home.index');
});
//***********************Rutas WEB****************************
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
  //Route::get('perfil','PaginasController@perfil');
  Route::get('perfil','UsuarioController@datosUsuario')->name('perfil');
  Route::post('actualizarperfil', 'UsuarioController@store');
  //***********************Rutas de Materias Decentes***************************
  Route::resource('materiasdocente','MateriasDocenteController');

  //***********************Rutas de Apuntes*************************************
  Route::resource('apuntes','ApuntesController');
  //Route::get('vistaDepartamentos','VistaDeptosController@mostrarVistaDptos');
  Route::get('dpto/{nombre}','VistaCarrerasController@mostrarVistaCarreras')->name('dpto.carreras');
  Route::get('dpto/{nombre}/{carrera}','VistaMateriasController@mostrarVistaMaterias')->name('dpto.materias');
  Route::get('dpto/{nombre}/{carrera}/{materia}','VistaApuntesController@mostrarVistaApuntes')->name('dpto.apuntes');
  Route::get('dpto/{nombre}/{carrera}/{materia}/{apunte}','ApuntesController@show')->name('show.apunte');

  Route::group(['middleware' => 'standard'], function () { 
    //**********Rutas exclusivas de Docenes ***********
    Route::get('subida','ApuntesController@create')->name('subida');
    Route::post('subirapunte','ApuntesController@store');
    Route::get('historial','ApuntesController@index');
  });
});

