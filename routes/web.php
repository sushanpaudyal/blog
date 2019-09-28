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


Auth::routes();

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

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
});
