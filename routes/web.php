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

//Shifts
Route::get('/shifts', 'ShiftControllers\ShiftController@getShift')->name('shift');	
/*Route::get('/shifts', function () {
    return view('shifts.shift');
});*/

Route::get('/recover', function () {
    return view('recover.recover');
});
Route::get('/', function () {
    return view('connect.login');
});

Route::get('/login', 'ConnectController@getLogin')->name('login'); 

Route::post('/login', 'ConnectController@postLogin')->name('login'); 

Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');

Route::get('/logout', 'ConnectController@getLogout')->name('logout');  //MODIF