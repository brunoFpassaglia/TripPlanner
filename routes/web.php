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
Route::resource('trips', 'TripController')->middleware('auth');
Route::get('personaltrips', 'TripController@personal')->name('trips.personal_trips');
Route::resource('trips.posts', 'PostController')->middleware('auth');
Route::resource('trips.posts.comments', 'CommentController');
Route::get('users/{user}', 'UserController@show')->name('profile');
Route::get('users/{user}/edit', 'UserController@edit')->middleware('editpage')->name('edit_profile');
Route::get('users/{user}/editaccount', 'UserController@editAccount')->middleware('editpage')->name('edit_account');
Route::put('users/{user}', 'UserController@update')->name('users.update');
Route::post('trips/{trip}/jointrip', 'TripController@joinTrip')->name('trips.jointrip');
Route::post('trips/{trip}/quittrip', 'TripController@quitTrip')->name('trips.quittrip');
Route::post('trips/{trip}/participants/{user}/add', 'ParticipantsController@add')->name('trips.participants.add');
Route::get('trips/{trip}/participants/search', 'ParticipantsController@search')->name('trips.participants.search');
Route::post('trips/{trip}/invitations/{user}/add', 'InvitationController@add')->name('trips.invitations.add');
// Route::resource('trips.invitations', 'InvitationController');
Route::resource('trips.participants', 'ParticipantsController');
Route::get('invitations', 'InvitationController@index')->name('invitations');
Route::post('invitations/{invitation}/accept', 'InvitationController@accept')->name('invitation.accept');
Route::post('invitations/{invitation}/reject', 'InvitationController@reject')->name('invitation.reject');
// Route::get('trips/{trip}/participants', 'ParticipantsController@index')->name('trips.participants.index');