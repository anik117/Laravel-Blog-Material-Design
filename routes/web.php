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

Route::get('/', 'HomeController@index')->name('home');

Route::get('post/{slug}', 'PostController@details')->name('post.details');

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Auth::routes();

//Authenticated user Routes
Route::group(['middleware' => ['auth']], function (){
    Route::post('favorite/{post}/add', 'FavoriteController@addFavorite')->name('post.favorite');
});

//Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function (){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('tag', 'TagController');
        Route::resource('category', 'CategoryController');
        Route::resource('post', 'PostController');

        Route::get('/pending/post', 'PostController@pending')->name('post.pending');
        Route::put('/post/{id}/approve', 'PostController@approval')->name('post.approve');

        Route::get('/favorite', 'FavoriteController@index')->name('post.favorite');

        Route::get('/subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::delete('/subscriber/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');

        Route::get('/profile/settings', 'ProfileSettingsController@index')->name('profile.settings');
        Route::put('/profile/update', 'ProfileSettingsController@update')->name('profile.update');
        Route::put('/password/update', 'ProfileSettingsController@updatePassword')->name('password.update');

    });

//Author Routes
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']],
    function (){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('post', 'PostController');

        Route::get('/favorite', 'FavoriteController@index')->name('post.favorite');

        Route::get('/profile/settings', 'ProfileSettingsController@index')->name('profile.settings');
        Route::put('/profile/update', 'ProfileSettingsController@update')->name('profile.update');
        Route::put('/password/update', 'ProfileSettingsController@updatePassword')->name('password.update');
    });
