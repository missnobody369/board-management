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
        'as' => 'posts.create'
    ]);

    // Create route for storing post
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'posts.store'
    ]);

    // Create route for delete or soft trash post
    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'
    ]);

    // Create route for viewing post
    Route::get('/post', [
        'uses' =>  'PostsController@index',
        'as' => 'posts'
    ]);

    // Create route for viewing trashed posts
    Route::get('/post/trashed', [
        'uses' =>  'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    // Create route for permanently delete posts
    Route::get('/post/kill/{id}', [
        'uses' =>  'PostsController@kill',
        'as' => 'posts.kill'
    ]);

    // Create route for restoring all trashed post
    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

    // Create route for editing posts
    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);

    // Create route for updating posts
    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'posts.update'
    ]);

    // Create route for category
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    // Store category details route
    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    // Get data from categories table in db
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    // Route for editing categories
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    // Route for deleting categories
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    // Route Update
    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);
});



