<?php

Route::prefix('/admin')->group( function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Procedures
	Route::get('/procedures/{id}', 'Admin\ProcedureControllers\ProcedureController@getProcedures')->name('procedure');
	Route::post('/procedure/add', 'Admin\ProcedureControllers\ProcedureController@postProcedureAdd')->name('procedure');
	Route::get('/procedure/{id}/edit', 'Admin\ProcedureControllers\ProcedureController@getProcedureEdit')->name('procedure');
	Route::post('/procedure/{id}/edit', 'Admin\ProcedureControllers\ProcedureController@postProcedureEdit')->name('procedure');
	Route::get('/procedure/{id}/delete', 'Admin\ProcedureControllers\ProcedureController@getProcedureDelete')->name('procedure');	

});