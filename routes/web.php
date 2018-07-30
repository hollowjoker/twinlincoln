<?php

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

Route::get('/', function () {
    if(Auth::guard('admin')->check()){
        return redirect('/dashboard');
    }
    else{
        return redirect('/login');
    }
});

Route::group(['prefix' => '/login', 'middleware' => ['web']], function(){
    Route::get('/','Auth\LoginController@index')->name('login');
    Route::post('/post','Auth\LoginController@post')->name('login.post');
    Route::get('/logout','Auth\LoginController@logout')->name('login.logout');
});

Route::group(['prefix' => '/dashboard', 'middleware' => ['web','admin'], 'guard'=>'admin'], function(){
    Route::get('/','DashboardController@index')->name('dashboard');
    Route::post('/attendanceSave'.'DashboardController@attendanceSave')->name('dashboard.attendance_save');
});

// category
Route::group(['prefix' => '/category', 'middleware' => ['web','admin'], 'guard' => 'admin'], function(){
    Route::get('/{type?}','CategoryController@index')->name('category');
    Route::post('/store','CategoryController@store')->name('category.store');
    Route::get('/show/{id}/{type?}','CategoryController@show')->name('category.show');
    Route::delete('/destroy/{id}','CategoryController@destroy')->name('category.destroy');
});

// product
Route::group(['prefix' => '/product', 'middleware' => ['web','admin'], 'guard' => 'admin'],function(){
    Route::get('/{line?}', 'ProductController@index')->name('product');
    Route::post('/store', 'ProductController@store')->name('product.store');
});

Route::get('/inventory', 'InventoryController@index')->name('inventory');

// expense
Route::group(['prefix' => '/expense', 'middleware' => ['web','admin'], 'guard' => 'admin'], function(){
    Route::get('/{type?}', 'ExpenseController@index')->name('expense');
    Route::post('/store/{api?}', 'ExpenseController@store')->name('expense.store');
});

