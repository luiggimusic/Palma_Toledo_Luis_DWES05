<?php

use Illuminate\Support\Facades\Route;

Route::get('user/get','App\Http\Controllers\UserController@getAllUsers')->name('userGet_ruta');
Route::get('user/getId','App\Http\Controllers\UserController@getUserById')->name('userGetId_ruta');
Route::post('user/create','App\Http\Controllers\UserController@createUser')->name('createUser_ruta');
Route::put('user/update/{user}','App\Http\Controllers\UserController@updateUser')->name('updateUser_ruta');
Route::delete('user/delete/{user}','App\Http\Controllers\UserController@deleteUser')->name('deleteUser_ruta');



