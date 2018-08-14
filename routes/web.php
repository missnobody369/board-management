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
Route::get('/test', function(){
    return App\User::find(1)->profile;
});


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

    // Route for tags
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    // Route for editing tags
    Route::get('/tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    // Route for updating tags
    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    // Route for deleting tags
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    // Route for creating tags
    Route::get('/tags/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    // Route for storing tags
    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);
    
    // Route for users profile
    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    // Route fro creating user
    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    // Route for Storing user in database
    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    // Delete route 
    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    // Route making a user admin
    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);
    
    // Route for make user not admin
    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    // Route for editing profile
    Route::get('user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    // Route for updating profile
    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);
});
