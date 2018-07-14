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
    // $task = [
    //     'sample1',
    //     'sample2',
    //     'sample3'
    // ];
    $list = DB::table('book')->get();
    // return $list;
    return view('pages/list',compact('list'));
});


