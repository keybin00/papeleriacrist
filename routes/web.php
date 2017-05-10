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


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


/*Users*/
Route::get('/users','UsersController@index');
Route::get('/users/new','UsersController@new1');
Route::post('/users/create','UsersController@create');
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
Route::get('/devices/newrent/{id}','DevicesController@newrent');
Route::get('/devices/turnon/{id}','DevicesController@turnon');
Route::get('/devices/turnoff/{id}','DevicesController@turnoff');
Route::post('/devices/update/{id}','DevicesController@update');
Route::get('/devices/edit/{id}','DevicesController@edit');
Route::get('/devices/delete/{id}','DevicesController@delete');

/*Storage*/
Route::get('/storage','StorageController@index');
Route::get('/storage/new','StorageController@new1');
Route::post('/storage/create','StorageController@create')->name('create');
Route::get('/storage/get','StorageController@getstorage');
Route::get('storage/edit/{id}', ['as' => 'storage.edit','uses' => 'StorageController@edit']);
Route::post('storage/update/{id}', ['as' => 'storage.update','uses' => 'StorageController@update']);
Route::get('storage/delete/{id}', ['as' => 'storage.delete','uses' => 'StorageController@delete']);
Route::get('/storage/productvisor','StorageController@productVisor');


/*Rents*/
Route::post('/rents/create/{id}','RentsController@create');
Route::post('/rents/closerent','RentsController@closerent');
Route::post('/rents/finalize','RentsController@finalize');
Route::get('/rents/test','RentsController@test');
Route::get('/rents','RentsController@index');
Route::get('/rents/getrents','RentsController@getrents');
Route::get('/rents/gethoursbetweendates','RentsController@gethoursbetweendates');
Route::get('/rents/ticket/{id}','RentsController@ticket');
Route::get('/rents/downloadticket/{id}','RentsController@downloadticket');



/*Sells*/
Route::get('/sells','SellsController@index');
Route::get('/sells/seller','SellsController@seller');
Route::post('/sells/seller/searcher','SellsController@searcher');
Route::post('/sells/seller/newsell','SellsController@sellRegister');
Route::get('/sells/recipe','SellsController@getRecipe');
Route::get('/sells/downloadrecipe/{id}','SellsController@downloadRecipe');
Route::get('/sells/get','SellsController@gettable');


