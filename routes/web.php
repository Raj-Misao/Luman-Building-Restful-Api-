<?php

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
    return $router->app->version();
});

$router->group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function() use($router){
    $router->get('user',function(){
        return "I AM' Anonymous USER";
    });
    $router->get('profile',function(){
        return response()->json(array(['massage'=>'HEllo, Massage'],['massage'=>'Bye Massage'],['massage'=>'GoodBye Massage']));
    });
    //$router->post('/edit/{id}','UserController@edit');
});

$router->post('/register','UserController@register');
$router->post('/login',['middleware'=>'auth','uses'=>'UserController@login']);
$router->post('/edit/{id}','UserController@edit');