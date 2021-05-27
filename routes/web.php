<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::fallback(function () {
    return view('index');
});
//Route::get('/index2', function () {
//    return view('index2');
//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', 'App\Http\Controllers\AdminController@showform')->name('showform');
Route::get('/mainPageAdmin', 'App\Http\Controllers\AdminController@mainPageAdmin')->name('mainPageAdmin');
Route::post('administrator', 'App\Http\Controllers\AdminController@loginadmin')->name('administrator');
Route::get('/AddDataInDb', 'App\Http\Controllers\AdminController@showaction')->name('AddDataInDb');
Route::get('/EditDataInDb', 'App\Http\Controllers\EditDeleteDataController@EditDataInDb')->name('EditDataInDb')->middleware("CheckCookie");
Route::post('/controldata', 'App\Http\Controllers\ControlDataController@control')->name('controldata');
Route::get('/DeleteData/{id}', 'App\Http\Controllers\EditDeleteDataController@deletedata')->name('DeleteData')->middleware("CheckCookie");
Route::get('/EditData/{id}', 'App\Http\Controllers\EditDeleteDataController@editdata')->name('EditData')->middleware("CheckCookie");
Route::post('/NewEditionProduct/{id}', 'App\Http\Controllers\NewEditionProductController@NewEdition')->name('NewEditionProduct');

Route::post('/order', "App\Http\Controllers\OrderController@MakeOrder")->name('OrderController');
Route::get('/WorkWithOrders', 'App\Http\Controllers\WorkWithOrdersController@index')->name('WorkWithOrders')->middleware("CheckCookie");
Route::get('/ListOrders', 'App\Http\Controllers\WorkWithOrdersController@showListOrders')->name('ListOrders')->middleware("CheckCookie");
Route::get('/ListCompletedOrders', 'App\Http\Controllers\WorkWithOrdersController@showCompletedOrders')->name('ListCompletedOrders')->middleware("CheckCookie");
Route::get('/ListNotDoneOrders', 'App\Http\Controllers\WorkWithOrdersController@showNotDoneOrders')->name('ListNotDoneOrders')->middleware("CheckCookie");
Route::post('/selectOrderByDate', 'App\Http\Controllers\WorkWithOrdersController@selectOrderByDate')->name('selectOrderByDate');
Route::post('/selectOrderByPeriod', 'App\Http\Controllers\WorkWithOrdersController@selectOrderByPeriod')->name('selectOrderByPeriod');
Route::get('/ordercompleted/{id}', 'App\Http\Controllers\WorkWithOrdersController@ordercompleted')->name('ordercompleted')->middleware("CheckCookie");
Route::get('/orderdelete/{id}', 'App\Http\Controllers\WorkWithOrdersController@orderdelete')->name('orderdelete')->middleware("CheckCookie");
Route::post('/selectClient', 'App\Http\Controllers\WorkWithOrdersController@selectClient')->name('selectClient');


