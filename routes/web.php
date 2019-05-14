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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('administration.')->group(function () {
    Route::group(['middleware'=>['auth'],'roles' => ['admin']], function() {
      Route::resource('administration/fx_rates', 'Administration\FxRatesController');
      Route::resource('administration/clients', 'Administration\ClientsController');
      Route::resource('administration/recipients', 'Administration\RecipientsController');
     

    });
  });

  Route::resource('countries', 'CountryController');