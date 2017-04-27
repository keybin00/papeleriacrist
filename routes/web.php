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

/*Route::get('/', function () {
    return view('welcome');
});

// Route::get('about',function(){
// 	//return "about";
// 	$people = ["fernando","amilcar"];
// 	//return view("pages.about",['people' => $people]);
// 	return view("pages.about",compact('people'));
// 	//return view('pages.about')->with('people',$people);
// 	//return view('pages.about')->withPeople($people);

// });

Route::get('/about','PagesController@about');*/

/*Route::get('/','SiteController@login');
Route::get('/site/index','SiteController@index');
Route::post('/site/verify','SiteController@verify');
Route::get('/users/new','UsersController@new');
Route::post('/users/create','UsersController@create');
Route::get('/users/index','UsersController@index');

*/
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


/*Users*/
Route::get('/users','UsersController@index');
Route::get('/users/new','UsersController@new1');
Route::post('/users/create','UsersController@create')->name('create');
Route::get('/users/getusers','UsersController@getusers');
Route::get('users/edit/{id}', ['as' => 'users.edit','uses' => 'UsersController@edit']);
Route::post('users/update/{id}', ['as' => 'users.update','uses' => 'UsersController@update']);
Route::get('users/delete/{id}', ['as' => 'users.delete','uses' => 'UsersController@delete']);


/*Devices*/
Route::get('/devices','DevicesController@index');
Route::post('/devices/create','DevicesController@create');
Route::get('/devices/new','DevicesController@_new');
Route::get('/devices/getdevices','DevicesController@getdevices');
Route::get('/devices/list','DevicesController@devices');


