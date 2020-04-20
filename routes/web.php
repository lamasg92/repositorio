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
 
   Route::get('materias/index','MateriasController@index')->name('materias.index');
   Route::get('materias/create','MateriasController@create')->name('materias.create');
   Route::patch('materias/update/{idmateria}/{id}','MateriasController@update')->name('materias.update');
   Route::post('materias/store','MateriasController@store')->name('materias.store');
  Route::get('/materias/{id}/{carrera}/desable','MateriasController@desable')->name('materias.desable');
  Route::get('/materias/{id}/{carrera}/enable','MateriasController@enable')->name('materias.enable');
 Route::get('/materias/{id}/{carrera}/edit','MateriasController@edit')->name('materias.edit');
 

//******************************Rutas para users****************************************


  Route::get('user/{tipo}','UsersController@index')->name('users.index');
  Route::get('usercreate/{tipo}','UsersController@create')->name('users.create');
  Route::get('useredit/{id}/{tipo}','UsersController@edit')->name('users.edit');
  Route::patch('userupdate/{id}/{tipo}','UsersController@update')->name('users.update');
  Route::post('userstore/{tipo}','UsersController@store')->name('users.store');
  Route::get('/users/{id}/desable','UsersController@desable')->name('users.desable');
  Route::get('/users/{id}/enable','UsersController@enable')->name('users.enable');

  //**********************Rutas para mi perfil admin***************************************************
 //Route::resource('users','UsersController');

 Route::get('profile','UsersController@profile')->name('users.profile');
 Route::get('users/updatePassword','UsersController@updatePassword')->name('users.updatePassword');
 Route::post('users/updateMyPassword','UsersController@updateMyPassword')->name('users.updateMyPassword');
 Route::get('users/editProfile','UsersController@editProfile')->name('users.editProfile');
 Route::patch('users/editMyProfile','UsersController@editMyProfile')->name('users.editMyProfile');

 

  });
  
});

Route::get('/', function () {
    $dptos = App\Departamento::all();
    return view('home.index')->with('dptos',$dptos);
});

  Route::get('/noAutorizhed',function(){
    return view('auth.role');})->name('noAutorizhed');
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

