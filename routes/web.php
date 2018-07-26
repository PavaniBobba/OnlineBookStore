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
    return view('customer');
});


Route::get('/register','LoginController@index');
Route::get('/logout','LoginController@logout');
Route::get('/search','LoginController@search');
Route::get('/shoppingbasket','SearchController@shoppingbasket');
Route::get('/buy','SearchController@buy');
Route::post('customer', 
  ['as' => 'login', 'uses' => 'LoginController@authenticate']);

Route::post('register', 
  ['as' => 'registering', 'uses' => 'LoginController@registering']);

Route::post('search', 
  ['as' => 'searching', 'uses' => 'SearchController@index']);

Route::post('searchlist', 
  ['as' => 'addtocart', 'uses' => 'SearchController@addtocart']);

