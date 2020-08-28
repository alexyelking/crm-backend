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

Route::post('/auth/register', 'API\AuthController@register');
Route::post('/auth/login', 'API\AuthController@login');
Route::post('/auth/logout', 'API\AuthController@logout')->middleware(["auth:api"]);
Route::get('/auth/me', 'API\AuthController@me')->middleware(["auth:api"]);;


Route::get('/clients', 'API\ClientsController@index')->middleware(["auth:api"]);
Route::get('/clients/{id}', 'API\ClientsController@show')->middleware(["auth:api"]);
Route::post('/clients/{id}', 'API\ClientsController@update')->middleware(["auth:api"]);
Route::delete('/clients/{id}', 'API\ClientsController@destroy')->middleware(["auth:api"]);
Route::post('/clients', 'API\ClientsController@create')->middleware(["auth:api"]);