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

Route::get('/', function () {
    return view('welcome');
});


// resourcing and nested resources
Route::resource('user', 'UserController');
Route::resource('image', 'ImageController');
// messages belongs to on its own image (this is called resource nesting)
Route::resource('image.message', 'ImageController'); 
//Route::resource('message', 'MessageController'); 

// bind slug-based urls instead id
Route::bind('user', function($value, $route) {
    return App\User::whereSlug($value)->first();
});

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
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
