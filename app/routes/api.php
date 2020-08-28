<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix"=>"auth"], function (){
    Route::post('/register', 'API\AuthController@register');
    Route::post('/login', 'API\AuthController@login');

    Route::group(["middleware"=>"auth:api"], function (){
        Route::post('/logout', 'API\AuthController@logout');
        Route::get('/me', 'API\AuthController@me');
    });
});


Route::group(["prefix"=>"clients", "middleware"=>"auth:api"], function (){
    Route::get('/', 'API\ClientsController@index');
    Route::get('/{client}', 'API\ClientsController@show');
    Route::post('/{client}', 'API\ClientsController@update');
    Route::delete('/{client}', 'API\ClientsController@destroy');
    Route::post('/', 'API\ClientsController@create');
});