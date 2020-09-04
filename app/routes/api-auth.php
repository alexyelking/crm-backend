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

Route::post('/auth/logout', 'AuthController@logout')->name('auth.logout');
Route::get('/auth/me', 'AuthController@me')->name('auth.me');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/email', 'MailController@create')->name('email.create');
Route::get('/mail', 'EmailController@show')->name('email.show');

Route::group(["prefix"=>"clients"], function (){
    Route::get('/', 'ClientsController@index')->name('clients.index');
    Route::get('/{client}', 'ClientsController@show')->name('clients.show');
    Route::post('/{client}', 'ClientsController@update')->name('clients.update');
    Route::delete('/{client}', 'ClientsController@destroy')->name('clients.destroy');
    Route::post('/', 'ClientsController@create')->name('clients.create');
});