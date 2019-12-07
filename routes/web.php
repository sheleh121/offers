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




Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect(route('offers.create'));
    });

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::resource('products', 'ProductsController');
        Route::resource('employees', 'EmployeesController');
        Route::get('offers/{offer}/edit/', 'OffersController@edit')->name('offers.edit');
        Route::put('offers/{offer}', 'OffersController@update')->name('offers.update');
        Route::delete('offers/{offer}', 'OffersController@destroy')->name('offers.destroy');
    });

    Route::get('employees/{employee}/avatars/{path}', 'EmployeesController@getAvatar');
    Route::resource('offers', 'OffersController', ['except' => [
        'edit', 'update', 'destroy'
    ]]);
    Route::put('offers/{offer}/canceled', 'OffersController@canceled')->name('offers.canceled');
    Route::resource('termsOfPayments', 'TermsOfPaymentsController');

    Route::post('images', 'ImagesController@store');
    Route::get('images/{path}', 'ImagesController@get');
});
Auth::routes(['register' => false]);

