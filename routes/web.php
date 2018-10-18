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
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('register', 'Auth\LoginController@redirectToProvider')->name('register');

// all logged in users can access
Route::middleware(['auth'])->group(function() {
	Route::resource('categories', 'CategoryController');
	Route::resource('nominations', 'NominationController');
	Route::resource('votings', 'VotingController');
	Route::resource('users', 'UserController');
});

// only admin and moderators can access
Route::middleware(['admin', 'moderator'])->group(function() {
	// only admin can see this
	Route::resource('roles', 'RoleController')->middleware('admin');
	Route::resource('settings', 'SettingController')->middleware('admin');

	// users
	Route::get('users', 'UserController@index');	
	Route::delete('users/{id}', 'UserController@destroy');	
	Route::put('users/{id}', 'UserController@update');	
	Route::patch('users/{id}', 'UserController@update');	

	// categories
	Route::match(['patch', 'put'], 'categories/{id}', 'CategoryController@update');	
	Route::delete('categories/{id}', 'CategoryController@destroy');	
	Route::get('categories/create', 'CategoryController@create');	
	Route::post('categories', 'CategoryController@store');	

	// nominations
	Route::put('nominations/{id}', 'NominationController@update');	
	Route::patch('nominations/{id}', 'NominationController@update');
	Route::delete('nominations/{id}', 'NominationController@destroy');

	// votings
	Route::put('votings/{id}', 'VotingController@update');	
	Route::patch('votings/{id}', 'VotingController@update');	
	Route::delete('votings/{id}', 'VotingController@destroy');

});





Route::resource('nominationUsers', 'NominationUserController');