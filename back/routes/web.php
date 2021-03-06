<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return redirect('api/v1/clientes');
});


$router->group(['prefix' => 'api/v1'], function () use ($router) {

    //Clientes
    $router->group(['prefix' => 'clientes'], function () use ($router) {
        $router->get('/', [
            'as' => 'clientes', 'uses' => 'ClientesController@index'
        ]);

        $router->get('/{id}', [
            'as' => 'clientes', 'uses' => 'ClientesController@getClientebyId'
        ]);

        $router->post('created', [
            'as' => 'clientes', 'uses' => 'ClientesController@insert'
        ]);

        $router->post('update', [
            'as' => 'clientes', 'uses' => 'ClientesController@update'
        ]);

        $router->delete('delete/{id}', [
            'as' => 'clientes', 'uses' => 'ClientesController@delete'
        ]);
    });

    //Compra
    $router->group(['prefix' => 'compras'], function () use ($router) {
        $router->get('/', [
            'as' => 'compra', 'uses' => 'ComprasController@index'
        ]);

        $router->post('cadastrar', [
            'as' => 'compra', 'uses' => 'ComprasController@insert'
        ]);
    });

});
