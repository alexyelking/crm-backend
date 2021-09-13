<?php

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

Route::group(["prefix" => "emails"], function () {
    Route::get('/', 'EmailController@index')->name('emails.index');
    Route::post('/', 'EmailController@create')->name('emails.create');
    Route::get('/{email}', 'EmailController@show')->name('emails.show')->middleware('can:show,email');
});

Route::group(["prefix" => "clients"], function () {
    Route::get('/', 'ClientController@index')->name('clients.index');
    Route::post('/', 'ClientController@create')->name('clients.create');
    Route::get('/{client}', 'ClientController@show')->name('clients.show');
    Route::post('/{client}', 'ClientController@update')->name('clients.update');
    Route::delete('/{client}', 'ClientController@destroy')->name('clients.destroy');
});