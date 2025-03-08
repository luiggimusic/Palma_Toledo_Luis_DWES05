<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/get','App\Http\Controllers\UserController@getAllUsers')->name('userGet_ruta');
Route::get('user/getId','App\Http\Controllers\UserController@getUserById')->name('userGetId_ruta');
Route::post('user/create','App\Http\Controllers\UserController@createUser')->name('createUser_ruta');


