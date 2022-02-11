<?php


use App\Http\Models\Procedure\Procedure;
use App\Http\Models\User\Role;

function getArrayProcedures(){
    $arrayProcedures = Procedure::orderBy('created_at' , 'Asc')->pluck('description','id');  	
	return $arrayProcedures;
}

function getArrayRoles(){
    $arrayRoles = Role::orderBy('created_at' , 'Asc')->pluck('description','id');  	
	return $arrayRoles;
}
