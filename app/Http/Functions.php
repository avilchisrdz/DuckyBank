<?php


use App\Http\Models\Procedure\Procedure;

function getArrayProcedures(){
    $arrayProcedures = Procedure::orderBy('created_at' , 'Asc')->pluck('description','id');  	
	return $arrayProcedures;
}

