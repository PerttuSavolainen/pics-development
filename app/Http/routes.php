<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    // Authentication routes
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    
    // Registration routes
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
   
    // index route
    Route::get('/', function () {
        return view('welcome');
    });
    
    // index route
    Route::get('/index', function () {
        return view('welcome');
    });
    
    // info route
    Route::get('/info', function () {
        return view('info');
    });
    
    // image route
    Route::get('/image', 'ImageController@index');
    
    // for the ajax image loading
    Route::get('/loadImages', 'ImageController@loadMoreImages');
    Route::post('/loadImages', 'ImageController@loadMoreImages');
    
    // resourcing and nested resources
    Route::resource('user', 'UserController');
    Route::resource('image', 'ImageController');
    // messages belongs to on its own image (this is called resource nesting)
    Route::resource('image.message', 'MessageController'); 
    
    // bind slug-based urls instead id
    Route::bind('user', function($value, $route) {
        return App\User::whereSlug($value)->first();
    });
    
    
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    
});
