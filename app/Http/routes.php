<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use \App\Role;
 use \App\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', ['middleware'=>'auth',function () {
    return view('indexTheme');
}]);

Route::get('/home', function () {
    return view('indexTheme');
});

// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::when('auth/register', 'admin');
//
//	Registering Users
Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::get('auth/register', function () {
//     return view('auth/register');
// });
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//	Registering representatives
Route::get('auth/registerRepresentative', function () {
    return view('auth/registerRepresentative');
});

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('companies/{id}/activate', 'CompanyController@activate');
//Route::post('companies/{id}/delete', 'CompanyController@Eliminar');

//adminCruds
Route::get('users/allRunners', 'UserController@allRunners');
Route::get('users/allRepresentatives', 'UserController@allRepresentatives');
Route::get('races/all', 'RaceController@all');

//Register paricipant
Route::post('races/{id}/registerRunner', 'RaceController@registerRunner');

//Searches Routes
Route::get('/search/race', 'SearchController@getPage');
Route::post('search/searchRace', 'SearchController@searchRace');


// Resources
Route::resource('users', 'UserController');
Route::resource('companies', 'CompanyController');
Route::resource('races','RaceController');
Route::resource('sponsors','SponsorController');
Route::resource('notifications','NotificationController');
