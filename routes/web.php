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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('trips', 'TripController');
Route::resource('trips/{trip}/posts', 'PostController');
Route::resource('trips/{trip}/posts/{post}/comments', 'CommentController');
Route::get('users/{user}', 'UserController@show')->name('profile');
Route::get('users/{user}/edit', 'UserController@edit')->middleware('editpage')->name('edit_profile');
