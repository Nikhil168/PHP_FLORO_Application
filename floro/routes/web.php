<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/','UserController@home');
//Route::get('/users', 'UserController@index')->name('users');
Route::resource('users','UserController');
Route::get('/users', 'UserController@show');
//Route::get('/users/{user}/edit','UserController@edit');
//Route::patch('/users/{user}','UserController@update');
Route::get('/users/{user}','UserController@destroy');
Route::post('/users/create','UserController@create');
//Route::post('/users','UserController@store');
Route::get('/search','UserController@search');
Route::get('/export_excel/excel','ExportExcelController@excel')->name('export_excel.excel');