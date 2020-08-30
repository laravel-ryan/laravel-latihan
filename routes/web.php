<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index');
Route::get('/master', 'MasterController@index');
Route::post('/master', 'MasterController@store');
Route::get('/master/{id}/edit', 'MasterController@edit');
Route::put('/master/{id}', 'MasterController@update');
Route::get('/master/load/table', 'MasterController@loadTable');
Route::delete('/master/{id}', 'MasterController@destroy');
