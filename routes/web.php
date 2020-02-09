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
Route::get('personaltrips', 'TripController@personal')->name('trips.personal_trips');
Route::resource('trips.posts', 'PostController');
Route::resource('trips.posts.comments', 'CommentController');
Route::get('users/{user}', 'UserController@show')->name('profile');
Route::get('users/{user}/edit', 'UserController@edit')->middleware('editpage')->name('edit_profile');
Route::put('users/{user}', 'UserController@update')->name('users.update');
Route::post('trips/{trip}/jointrip', 'TripController@joinTrip')->name('trips.jointrip');
Route::post('trips/{trip}/quittrip', 'TripController@quitTrip')->name('trips.quittrip');
Route::resource('trips.participants', 'ParticipantsController');