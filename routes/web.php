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
	
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create','CrudController@create')->name('create');
Route::post('/register','CrudController@register')->name('register');
Route::get('/index','CrudController@index')->name('index');
Route::get('/edit/{id}','CrudController@edit');
Route::get('/delete/{id}','CrudController@delete');
Route::post('/update','CrudController@update')->name('update');
Route::post('/addNewpost','CrudController@addNewpost');