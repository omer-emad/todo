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

Route::get('/', function () { return view('welcome'); });

//Route::get('/', "todoscontroller@index");

Route::resource('todo' , 'todocontroller');

Auth::routes();
Route::get('/todo/{todo}/change ', 'todocontroller@change');
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
