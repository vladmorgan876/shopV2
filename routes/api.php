<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('product',\App\Http\Controllers\Api\v1\ProductController::class);
Route::get('getring', 'App\Http\Controllers\Api\v1\ProductController@getring')->name('getring');
Route::get('pendant', 'App\Http\Controllers\Api\v1\ProductController@getpendant')->name('getpendant');
Route::get('bracelet', 'App\Http\Controllers\Api\v1\ProductController@getbracelet')->name('getbracelet');
