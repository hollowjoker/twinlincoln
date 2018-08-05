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
    Route::get('/{type?}','DashboardController@index')->name('dashboard');
    Route::post('/attendanceSave'.'DashboardController@attendanceSave')->name('dashboard.attendance_save');
});

// category
Route::group(['prefix' => '/category', 'middleware' => ['web','admin'], 'guard' => 'admin'], function(){
    Route::post('/store','CategoryController@store')->name('category.store');
    Route::get('/show/{id}/{type?}','CategoryController@show')->name('category.show');
    Route::delete('/destroy/{id}','CategoryController@destroy')->name('category.destroy');
    Route::get('/{type?}','CategoryController@index')->name('category');
});

// product
Route::group(['prefix' => '/product', 'middleware' => ['web','admin'], 'guard' => 'admin'],function(){
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/create/{line?}', 'ProductController@create')->name('product.create');
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('/{type?}', 'ProductController@index')->name('product');
    Route::get('/getProduct/{id}', 'ProductController@getProduct')->name('product.getProduct');
    Route::patch('/update', 'ProductController@update')->name('product.update');
    Route::patch('/updateAll', 'ProductController@updateAll')->name('product.updateAll');
    
});

Route::group(['prefix' => '/inventory', 'middleware' => ['web','admin'], 'guard' => 'admin'], function(){
    Route::get('/{type?}','InventoryController@index')->name('inventory');
});

// expense
Route::group(['prefix' => '/expense', 'middleware' => ['web','admin'], 'guard' => 'admin'], function(){
    Route::get('/{type?}', 'ExpenseController@index')->name('expense');
    Route::post('/store/{api?}', 'ExpenseController@store')->name('expense.store');
});

