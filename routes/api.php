<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\PrincipleController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('values', 'ValueController@getValue');
Route::get('values/{id}', 'ValueController@getValueById');
Route::post('values', 'ValueController@insertValue');
Route::put('values/{id}', 'ValueController@updateValue');
Route::delete('values/{id}', 'ValueController@deleteValue');

Route::get('principles', 'PrincipleController@getPrinciple');
Route::get('principles/{id}', 'PrincipleController@getPrincipleById');
Route::post('principles', 'PrincipleController@insertPrinciple');
Route::put('principles/{id}', 'PrincipleController@updatePrinciple');
Route::delete('principles/{id}', 'PrincipleController@deletePrinciple');