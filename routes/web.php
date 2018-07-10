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

// Add similarities between get & post route
// Routes inside here are only access by admin
// Middleware - Application Filters
// First request filter - Authentication request filter (protect the routes)
Route::group(['prefix'=> 'admin', 'middleware'=>'auth'], function() {

    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    
    // Create a new post route
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    //Create route for storing post
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

});



