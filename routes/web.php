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
 
  //******************************Rutas para departamentos******************************************
  Route::resource('departamentos','DepartamentosController');




  });
});

Route::get('/', function () {
    return view('layouts.home');
});

Auth::routes();
Route::get('vistaDepartamentos','VistaDeptosController@mostrarVistaDptos');
Route::get('vistaCarreras/{id}','VistaCarrerasController@mostrarVistaCarreras');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
