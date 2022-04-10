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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/companies', 'CompanyController@index')->name('company');
    Route::get('/companies/insert', 'CompanyController@create');
    Route::post('/companies/store', 'CompanyController@store');
    Route::get('/companies/edit/{id}', 'CompanyController@edit');
    Route::post('/companies/update', 'CompanyController@update');
    Route::delete('/companies/delete{id}', 'CompanyController@destroy');
    Route::get('/employees', 'EmployeeController@index')->name('employee');
    Route::get('/employees/insert', 'EmployeeController@create');
    Route::get('/employees/company-list', 'EmployeeController@companyList');
    Route::post('/employees/store', 'EmployeeController@store');
    Route::post('/employees/import', 'EmployeeController@importData');
    Route::get('/employees/edit/{id}', 'EmployeeController@edit');
    Route::post('/employees/update', 'EmployeeController@update');
    Route::delete('/employees/delete{id}', 'EmployeeController@destroy');
});
