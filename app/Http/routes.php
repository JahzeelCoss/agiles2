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
use \App\Race;

Route::get('/', function () {
	$races = Race::activeOnes();
    return view('realIndex')->with('races', $races);
});

Route::get('/index', ['middleware'=>'auth',function () {	 
    //return User::find(60)->getRecommendedRaces();
    $races = Race::activeOnes();
    return view('realIndex')->with('races', $races);
}]);

Route::get('/home', function () {
    $races = Race::activeOnes();
    return view('realIndex')->with('races', $races);
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

//Payment
Route::get('races/{id}/payment', 'RaceController@paymentPage');
Route::post('races/{id}/payment', 'RaceController@registerRunner');

Route::get('races/myraces','RaceController@myRaces');

//Searches Routes
//	races
Route::get('/search/race', 'SearchController@getRacesPage');
Route::post('search/searchRace', 'SearchController@searchRace');
// companies
Route::get('/search/companies', 'SearchController@getCompaniesPage');
Route::post('search/companies', 'SearchController@searchCompany');
// runners
Route::get('/search/runners', 'SearchController@getRunnersPage');
Route::post('search/runners', 'SearchController@searchRunner');
// representatives
Route::get('/search/representatives', 'SearchController@getRepresentativesPage');
Route::post('search/representatives', 'SearchController@searchRepresentative');

Route::post('races/{id}/activate', 'RaceController@activate');

Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/prueba2', function () {
    return User::find(66)->getAge();
});

// Resources
Route::resource('users', 'UserController');
Route::resource('companies', 'CompanyController');
Route::resource('races','RaceController');
Route::resource('sponsors','SponsorController');
Route::resource('notifications','NotificationController');
