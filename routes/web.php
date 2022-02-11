<?php

use Illuminate\Support\Facades\Route;


//Shifts
Route::get('/shifts', 'ShiftControllers\ShiftController@getShift')->name('shift');	
Route::post('/shifts', 'ShiftControllers\ShiftController@postShiftAdd')->name('shift');	

Route::get('/shiftsshow', function () {
    return view('shift.shiftsshow');
});


//ShiftsHistories
Route::get('/shiftshistories', 'ShiftControllers\ShiftHistoryController@getShiftHistories')->name('shifthistory');	
Route::get('/consult_shifts', 'ShiftControllers\ShiftHistoryController@getShifts')->name('consult_shifts');	


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