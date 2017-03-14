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

Route::get('/','SiteController@login');
Route::get('/site/index','SiteController@index');
Route::post('/site/verify','SiteController@verify');