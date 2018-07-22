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
    return redirect('/dashboard');
});

Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::post('/dashboard/attendanceSave'.'DashboardController@attendanceSave')->name('dashboard.attendance_save');

// category
Route::get('/category','CategoryController@index')->name('category');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::get('/product', 'ProductController@index')->name('product');
