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

Route::get('/convert_term', 'StudentsController@convert_term');

Route::get('/prospects', 'ProspectsController@index');
Route::get('/students', 'StudentsController@index');

// Route::resource('prospects', 'ProspectsController');
Route::resource('customers', 'CustomersController');

Route::get('/get_number_of_ccsj_sports', 'StudentsController@get_number_of_ccsj_sports');

Route::get('/get_names', 'StudentsController@get_names');
