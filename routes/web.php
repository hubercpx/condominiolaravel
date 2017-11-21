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
Route::get('/empleado/empleado', 'EmpleadoController@index');
Route::get('/empleado/create', 'EmpleadoController@create');
Route::post('empleado/store', 'EmpleadoController@store');
Route::get('/empleado/detalle/{id}', 'EmpleadoController@show');
Route::get('/empleado/delete/{id}', 'EmpleadoController@delete');
Route::get('/empleado/edit/{id}','EmpleadoController@edit');
Route::post('/empleado/update/{id}', 'EmpleadoController@update');

Route::get('/residente/residente', 'ResidenteController@index');
Route::get('/residente/create', 'ResidenteController@create');
Route::post('residente/store', 'ResidenteController@store');
Route::get('/residente/detalle/{id}', 'ResidenteController@show');
Route::get('/residente/delete/{id}', 'ResidenteController@delete');
Route::get('/residente/edit/{id}','ResidenteController@edit');
Route::post('/residente/update/{id}', 'ResidenteController@update');

Route::get('/mes/mes', 'MesController@index');
Route::get('/mes/create', 'MesController@create');
Route::post('mes/store', 'MesController@store');
Route::get('/mes/detalle/{id}', 'MesController@show');
Route::get('/mes/delete/{id}', 'MesController@delete');
Route::get('/mes/edit/{id}','MesController@edit');
Route::post('/mes/update/{id}', 'MesController@update');

Route::get('/pago/pago', 'PagoController@index');
Route::get('/pago/create', 'PagoController@create');
Route::post('pago/store', 'PagoController@store');
Route::get('/pago/detalle/{id}', 'PagoController@show');
Route::get('/pago/delete/{id}', 'PagoController@delete');

Route::get('/factura/factura', 'FacturaController@index');
Route::get('/factura/detalle/{id}', 'FacturaController@show');
Route::get('/factura/delete/{id}', 'FacturaController@delete');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
