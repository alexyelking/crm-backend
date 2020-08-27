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

Route::get('/me', 'API\AuthController@me');


Route::post('/clients/create', 'API\ClientsController@create');              // Создать клиента
Route::get('/clients/read/{id}', 'API\ClientsController@read');              // Прочитать инфу о клиенте
Route::put('/clients/update/{id}', 'API\ClientsController@update');          // Редактировать клиента
Route::delete('/clients/delete', 'API\ClientsController@delete');            // Удалить клиента

Route::get('/clients', 'API\ClientsController@showAll');                       // Вызвать JSON со всеми клиентами
