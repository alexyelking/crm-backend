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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::post("/example1","API\AuthController@example1");
//Route::post("/example2","API\AuthController@example2");
//Route::get("/example3","API\AuthController@example3");


Route::post('/register', 'API\AuthController@register');

Route::post('/login', 'API\AuthController@login');

Route::post('/logout', 'API\AuthController@logout');

Route::post('/refresh', 'API\AuthController@refresh');

Route::get('/me', 'API\AuthController@me');