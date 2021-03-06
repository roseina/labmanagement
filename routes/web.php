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
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/admin/logout', 'Auth\LoginController@logout');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Admin\AdminController@index')->name('home');
@include('backend.php');


