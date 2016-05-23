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

// Route::get('/home', [
// 	'uses' => 'HomeController@index',
// 	'as'	=> 'home'
// ]);

// Route::get('/test', [
// 	'uses' => 'HomeController@test',
// 	'as'	=> 'test'
// ]);
// // Route::get('/test', function() {
// // 	return view('back/template');
// // });


// Route::get('admin', [
// 	'uses' => 'AdminController@admin',
// 	'as' => 'admin',
// 	'middleware' => 'admin'
// ]);


// Route::get('medias', [
// 		'uses' => 'AdminController@filemanager',
// 		'as' => 'medias',
// 		'middleware' => 'redac'
// 	]);


// 	// Blog
// Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
// Route::get('articles', 'BlogController@indexFront');
// Route::get('blog/tag', 'BlogController@tag');
// Route::get('blog/search', 'BlogController@search');

// Route::put('postseen/{id}', 'BlogController@updateSeen');
// Route::put('postactive/{id}', 'BlogController@updateActive');

// Route::resource('blog', 'BlogController');

// // Comment
// Route::resource('comment', 'CommentController', [
// 	'except' => ['create', 'show']
// ]);

// Route::put('commentseen/{id}', 'CommentController@updateSeen');
// Route::put('uservalid/{id}', 'CommentController@valid');


// // Contact
// Route::resource('contact', 'ContactController', [
// 	'except' => ['show', 'edit']
// ]);


// // User
// Route::get('user/sort/{role}', 'UserController@indexSort');

// Route::get('user/roles', 'UserController@getRoles');
// Route::post('user/roles', 'UserController@postRoles');

// Route::put('userseen/{user}', 'UserController@updateSeen');

// Route::resource('user', 'UserController');



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
	Route::get('/unlike', 'ProductController@unlike');
	Route::get('/col', ['as' => 'getCol', 'uses' => 'CollectionController@getCol']);
});

Route::group(['prefix' => 'favor'], function(){
	Route::get('col', ['as' => 'viewOneCollect', 'uses' => 'CollectionController@colAction']);
});