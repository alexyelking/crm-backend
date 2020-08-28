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

Route::group(["prefix"=>"auth", "namespace"=>"API"], function (){
    Route::group(["middleware"=>"guest:api"], function (){
        Route::post('/register', 'AuthController@register')->name('auth.register');
        Route::post('/login', 'AuthController@login')->name('auth.login');
    });
    Route::group(["middleware"=>"auth:api"], function (){
        Route::post('/logout', 'AuthController@logout')->name('auth.logout');
        Route::get('/me', 'AuthController@me')->name('auth.me');
    });
});


Route::group(["prefix"=>"clients", "middleware"=>"auth:api", "namespace"=>"API"], function (){
    Route::get('/', 'ClientsController@index')->name('clients.index');
    Route::get('/{client}', 'ClientsController@show')->name('clients.show');
    Route::post('/{client}', 'ClientsController@update')->name('clients.update');
    Route::delete('/{client}', 'ClientsController@destroy')->name('clients.destroy');
    Route::post('/', 'ClientsController@create')->name('clients.create');
});