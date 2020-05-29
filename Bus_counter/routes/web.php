<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');

Route::get('/logout', 'logoutController@index');

Route::group(['middleware'=>['sess']], function(){

Route::get('/', function () {
    return view('welcome');
});



	Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/home', 'HomeController@Userindex')->name('home.Userindex');

    Route::get('viewManager', 'AdminController@viewManager')->name('viewManager');
    Route::delete('deleteManager/{id}','AdminController@deleteManager')->name('deleteManager');

    Route::get('viewStaff', 'AdminController@viewStaff')->name('viewStaff');
    Route::delete('deletestaff/{id}','AdminController@deletestaff')->name('deletestaff');
    Route::get('editStaff/{id}','AdminController@editStaff')->name('editStaff');
    Route::post('updateStaff/{id}','AdminController@updateStaff')->name('updateStaff');


    Route::get('viewCounter', 'AdminController@viewCounter')->name('viewCounter');
    Route::delete('deletecounter/{id}','AdminController@deletecounter')->name('deletecounter');
    Route::get('editcounter/{id}','AdminController@editcounter')->name('editcounter');
    Route::post('updatecounter/{id}','AdminController@updatecounter')->name('updatecounter');


    Route::get('viewBus', 'AdminController@viewBus')->name('viewBus');
    Route::delete('deletebus/{id}','AdminController@deletebus')->name('deletebus');
    Route::get('editbus/{id}','AdminController@editbus')->name('editbus');
    Route::post('updatebus/{id}','AdminController@updatebus')->name('updatebus');

    Route::get('home.viewBus', 'HomeController@viewBus')->name('home.viewBus');
    Route::delete('home.deletebus/{id}','HomeController@deletebus')->name('home.deletebus');
    Route::get('home.editbus/{id}','HomeController@editbus')->name('home.editbus');
    Route::post('home.updatebus/{id}','HomeController@updatebus')->name('home.updatebus');

    Route::get('home.addBus', 'HomeController@addBus')->name('home.addBus');
    Route::post('home.addBus', 'HomeController@storeBus')->name('home.storeBus');

    Route::get('home.search', 'HomeController@searchBus')->name('home.search');
    Route::get('search', 'AdminController@searchBus')->name('search');
    Route::get('searchCounter', 'AdminController@searchCounter')->name('searchCounter');
});