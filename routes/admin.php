<?php

Route::prefix('/admin')->group( function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Procedures
	Route::get('/procedures/{id}', 'Admin\ProcedureControllers\ProcedureController@getProcedures')->name('procedure');
	Route::post('/procedure/add', 'Admin\ProcedureControllers\ProcedureController@postProcedureAdd')->name('procedure');
	Route::get('/procedure/{id}/edit', 'Admin\ProcedureControllers\ProcedureController@getProcedureEdit')->name('procedure');
	Route::post('/procedure/{id}/edit', 'Admin\ProcedureControllers\ProcedureController@postProcedureEdit')->name('procedure');
	Route::get('/procedure/{id}/delete', 'Admin\ProcedureControllers\ProcedureController@getProcedureDelete')->name('procedure');	

	//Roles
	Route::get('/roles/{id}', 'Admin\ConfigControllers\RoleController@getRoles')->name('role');
	Route::post('/role/add', 'Admin\ConfigControllers\RoleController@postRoleAdd')->name('role');
	Route::get('/role/{id}/edit', 'Admin\ConfigControllers\RoleController@getRoleEdit')->name('role');
	Route::post('/role/{id}/edit', 'Admin\ConfigControllers\RoleController@postRoleEdit')->name('role');
	Route::get('/role/{id}/delete', 'Admin\ConfigControllers\RoleController@getRoleDelete')->name('role');

	//UserStatuses
	Route::get('/userstatuses/{id}', 'Admin\ConfigControllers\UserStatusController@getUserStatuses')->name('userstatus');
	Route::post('/userstatus/add', 'Admin\ConfigControllers\UserStatusController@postUserStatusAdd')->name('userstatus');
	Route::get('/userstatus/{id}/edit', 'Admin\ConfigControllers\UserStatusController@getUserStatusEdit')->name('userstatus');
	Route::post('/userstatus/{id}/edit', 'Admin\ConfigControllers\UserStatusController@postUserStatusEdit')->name('userstatus');
	Route::get('/userstatus/{id}/delete', 'Admin\ConfigControllers\UserStatusController@getUserStatusDelete')->name('userstatus');	


	//Users
	Route::get('/users/{id}', 'Admin\ConfigControllers\UserController@getUsers')->name('user');
	Route::post('/user/add', 'Admin\ConfigControllers\UserController@postUserAdd')->name('user');
	Route::get('/user/{id}/edit', 'Admin\ConfigControllers\UserController@getUserEdit')->name('user');
	Route::post('/user/{id}/edit', 'Admin\ConfigControllers\UserController@postUserEdit')->name('user');
	Route::get('/user/{id}/delete', 'Admin\ConfigControllers\UserController@getUserDelete')->name('user');

	//Cashiers
	Route::get('/cashiers/{id}', 'Admin\CashierControllers\CashierController@getCashiers')->name('cashier');
	Route::post('/cashier/add', 'Admin\CashierControllers\CashierController@postCashierAdd')->name('cashier');
	Route::get('/cashier/{id}/edit', 'Admin\CashierControllers\CashierController@getUserEdit')->name('cashier');
	Route::post('/cashier/{id}/edit', 'Admin\CashierControllers\CashierController@postCashierEdit')->name('cashier');
	Route::get('/cashier/{id}/delete', 'Admin\CashierControllers\CashierController@getCashierDelete')->name('cashier');

	//UserStatuses
	Route::get('/cashierstatuses/{id}', 'Admin\CashierControllers\CashierStatusController@getCashierStatuses')->name('cashierstatus');
	Route::post('/cashierstatus/add', 'Admin\CashierControllers\CashierStatusController@postCashierStatusAdd')->name('cashierstatus');
	Route::get('/cashierstatus/{id}/edit', 'Admin\CashierControllers\CashierStatusController@getCashierStatusEdit')->name('cashierstatus');
	Route::post('/cashierstatus/{id}/edit', 'Admin\CashierControllers\CashierStatusController@postCashierStatusEdit')->name('cashierstatus');
	Route::get('/cashierstatus/{id}/delete', 'Admin\CashierControllers\CashierStatusController@getCashierStatusDelete')->name('cashierstatus');		

});