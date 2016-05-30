<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', [
	'uses' => 'HomeController@index',
	'as'	=> 'home'
]);

Route::get('/admin', [
	'uses' => 'Admin\AdminController@index',
	'as'	=> 'admin'
]);

Route::resource('product', 'Admin\ProductController');
Route::resource('brand', 'Admin\BrandController');


//API
Route::group(['prefix' => 'user'], function(){
	Route::get('/setgender', 'UserController@setGender');
	Route::get('/setbrand', 'UserController@setBrands');
	Route::get('/brands', 'UserController@getBrands');
	Route::get('/set', 'UserController@setBoth');
	Route::get('/pref', 'UserController@getUserPref');
});

Route::group(['prefix' => 'prod'], function(){
	Route::get('/view', ['as' => 'apiProdView', 'uses' => 'ProductController@view']);
	Route::get('/like', ['as' => 'prodLike', 'uses' =>'ProductController@like']);
	Route::get('/save', ['as' => 'prodSave', 'uses' =>'ProductController@save']);
	Route::get('/share', ['as' => 'prodShare', 'uses' =>'ProductController@share']);
	Route::get('/alert/follow', ['as' => 'prodAlert', 'uses' =>'ProductController@alert']);
	Route::get('/col', ['as' => 'getCol', 'uses' => 'CollectionController@getCol']);
});

Route::group(['prefix' => 'favor'], function(){
	Route::get('col', ['as' => 'viewOneCollect', 'uses' => 'CollectionController@colAction']);
	Route::get('cols', ['as' => 'viewAllFavorCol', 'uses' => 'CollectionController@colsAction']);
});