<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix'=>'sales', 'middleware' => 'auth' ], function(){

    Route::get('/', function () {
        return View('sales.index');
    });

    //USUARIOS
    Route::get('/users', 'UserController@index' );
    Route::post('/users/register','UserController@create');

    //PRODUCTOS
    Route::get('/productos', 'ProductoController@index' );
//    crear producto
    Route::post('/productos/register','ProductoController@create' );
//    editar producto
    Route::get('/productos/editar/{id}', 'ProductoController@edit' );
//    actualizar producto
    Route::get('/productos/actualizar/{id}', 'ProductoController@update' );
//    eliminar producto
    Route::get('/productos/eliminar/{id}', 'ProductoController@destroy' );
// buscar Producto
    Route::get('/productos/buscar','ProductoController@buscarProducto');

//    VENTAS
    Route::get('/ventas','ventaController@index');

//    buscar producto en venta
    Route::post('/venta/nueva',[
        'as'=>'venta.nueva',
        'uses'=>'VentaController@buscarProducto'
    ]);

    //registrar venta
    Route::get('/ventas/registrar',[
        'as'=> 'registrar.venta',
        'uses'=>'VentaController@create']);

    //COMPRAS
    Route::get('/compras','CompraController@index');


});

Route::get('sales/auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...

Route::post( '/settings', array(
    'as' => 'settings.create',
    'uses' => 'LegajosController@buscar'
) );