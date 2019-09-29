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

Route::get('/', 'HomeController@index')->name('indexpage');

Route::get('/posts', 'PostController@index')->name('post.index');


Route::get('/post/{slug}', 'PostController@details')->name('post.details');

Route::get('/category/{slug}', 'PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}', 'PostController@postByTag')->name('tag.posts');



Auth::routes();

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Route::get('/search', 'SearchController@search')->name('search');

Route::group(['middleware' => ['auth']], function (){
    Route::post('/favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');

    // Comment Routes
    Route::post('comment/{post}', 'CommentsController@store')->name('comment.store');
});


Route::group(['as' => 'admin.','prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
    // Admin Dashboard
   Route::get('dashboard', 'DashboardController@index')->name('dashboard');

   // Tag Routes
    Route::resource('tag', 'TagController');

    // Category Route
    Route::resource('category', 'CategoryController');

    // Post Route
    Route::resource('post', 'PostController');

    Route::put('/post/{id}/approve', 'PostController@approval')->name('post.approve');
    Route::get('/pending/post', 'PostController@pending')->name('post.pending');

    // Subscriber
    Route::get('/subscriber', 'SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}', 'SubscriberController@destroy')->name('subscriber.destroy');

    // Settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@profileUpdate')->name('profile.update');

    Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');

    // Favorites
    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');


    // Comments
    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comment.destroy');



});

Route::group(['as' => 'author.','prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Post Route
    Route::resource('post', 'PostController');


    // Settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@profileUpdate')->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');


    // Favorites
    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');


    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comment.destroy');
});


View::composer('layouts.frontend.partial.footer', function ($view){
  $categories = \App\Category::all();
  $view->with('categories', $categories);
});