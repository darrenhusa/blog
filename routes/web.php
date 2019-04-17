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

Route::get('/dashboard', function () {
    return view('dashboard_test');
});


Route::get('/convert_term', 'StudentsController@convert_term');

Route::get('/prospects', 'ProspectsController@index');
Route::get('/get_last_names', 'ProspectsController@get_last_names');

Route::get('/prospect_counts', 'ProspectsController@counts_by_admissions_status');
Route::get('/students', 'StudentsController@index');

Route::get('/get_students_paged', 'StudentsController@get_students');

// Route::resource('prospects', 'ProspectsController');
Route::resource('customers', 'CustomersController');

Route::get('/get_number_of_ccsj_sports', 'StudentsController@get_number_of_ccsj_sports');

Route::get('/get_names', 'StudentsController@get_names');
