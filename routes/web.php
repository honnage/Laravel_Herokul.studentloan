<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','StatusIS'])->group(function(){
    // Route::resource('/LoanType', 'LoanTypeController');

    // Route::get('LoanType/','LoanTypeController@index');
    Route::get('LoanType/create','LoanTypeController@create');
    Route::post('LoanType/store','LoanTypeController@store');
    Route::get('LoanType/edit/{id}','LoanTypeController@edit');
    Route::post('LoanType/update/{id}','LoanTypeController@update');
    Route::get('LoanType/destroy/{id}','LoanTypeController@destroy');

    Route::get('SendDocuments/dashboard','SendDocumentController@dashboard');
    Route::get('SendDocuments/edit/{id}','SendDocumentController@edit');
    Route::post('SendDocuments/update/{id}','SendDocumentController@update');

    Route::get('Accounts/dashboard','AccountController@dashboard');
    Route::get('Accounts/edit/{id}','AccountController@edit');
    Route::post('Accounts/update/{id}','AccountController@update');
    Route::get('Accounts/showAdmin/{id}','AccountController@showAdmin');
    Route::get('Accounts/detailsAdmin/{id}','AccountController@detailsAdmin');

    Route::get('Profiles/dashboard','ProfileController@dashboard');
    Route::get('Profiles/dashboardUser','ProfileController@dashboardUser');

    Route::get('User/editStatus/{id}','UserController@editStatus');
    Route::post('User/update/{id}','UserController@update');

});

Route::middleware(['auth','checkID'])->group(function(){
    Route::resource('/Profiles', 'ProfileController');

    Route::get('SendDocuments/create','SendDocumentController@create');
    Route::post('SendDocuments/store','SendDocumentController@store');
    Route::get('SendDocuments/show/{id}','SendDocumentController@show');
    Route::get('SendDocuments/details/{id}','SendDocumentController@details');
    Route::get('SendDocuments/destroy/{id}','SendDocumentController@destroy');

    Route::get('Accounts/show/{id}','AccountController@show');
    Route::get('Accounts/details/{id}','AccountController@details');

});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
