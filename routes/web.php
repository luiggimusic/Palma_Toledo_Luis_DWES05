<?php

use Illuminate\Support\Facades\Route;

// User
Route::get('user/get','App\Http\Controllers\UserController@getAllUsers')->name('userGet_ruta');
Route::get('user/getId','App\Http\Controllers\UserController@getUserById')->name('userGetId_ruta');
Route::post('user/create','App\Http\Controllers\UserController@createUser')->name('createUser_ruta');
Route::put('user/update/{dni}','App\Http\Controllers\UserController@updateUser')->name('updateUser_ruta');
Route::delete('user/delete/{dni}','App\Http\Controllers\UserController@deleteUser')->name('deleteUser_ruta');

// ProductCategory
Route::get('productcategory/get','App\Http\Controllers\ProductCategoryController@getAllProductCategories')->name('productCategoryGet_ruta');
Route::get('productcategory/get/{id}','App\Http\Controllers\ProductCategoryController@getProductCategoryById')->name('productCategoryGetId_ruta');
Route::post('productcategory/create','App\Http\Controllers\ProductCategoryController@createProductCategory')->name('createProductCategory_ruta');
Route::put('productcategory/update/{id}','App\Http\Controllers\ProductCategoryController@updateProductCategory')->name('updateProductCategory_ruta');
Route::delete('productcategory/delete/{id}','App\Http\Controllers\ProductCategoryController@deleteProductCategory')->name('deleteProductCategory_ruta');



