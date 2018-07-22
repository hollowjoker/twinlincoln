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

Route::group(['prefix' => '/dashboard', 'middleware' => ['web'], 'guard'=>'admin'], function(){

    Route::get('/','DashboardController@index')->name('dashboard');

    Route::post('/attendanceSave'.'DashboardController@attendanceSave')->name('dashboard.attendance_save');

});

// category
Route::get('/category','CategoryController@index')->name('category');


Route::group(['prefix' => '/login', 'middleware' => ['web']], function(){
    Route::get('/','Auth\LoginController@index')->name('login');
    Route::post('/post','Auth\LoginController@post')->name('login.post');
    Route::get('/logout','Auth\LoginController@logout')->name('login.logout');
});

Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::get('/product', 'ProductController@index')->name('product');
