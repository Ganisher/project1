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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('/');

    Route::get('/drivers', 'DriversController@index')->name('drivers');
    Route::get('/drivers/form', 'DriversController@form')->name('drivers.form');
    Route::post('/drivers/submit', 'DriversController@submit')->name('drivers.submit');
    Route::any('/drivers/delete', 'DriversController@delete')->name('drivers.delete');
    Route::get('/drivers/cars', 'DriversController@carsIndex')->name('drivers.cars');
    Route::get('/drivers/penalties', 'DriversController@driversPenalties')->name('drivers.penalties');
    Route::get('/drivers/penalties/form', 'DriversController@penaltiesCheckFormPage')->name('drivers.penaltiesCheckForm');
    Route::any('/drivers/penalties/submit', 'DriversController@penaltiesCheck')->name('drivers.penaltiesCheck');

    Route::get('/installments/payments', 'InstallmentsController@paymentsPage')->name('installments.payments');
    Route::get('/installments/upload', 'InstallmentsController@uploadPage')->name('installments.upload');

});

