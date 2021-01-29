<?php

namespace App\Http\Controllers\ShiftControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Shift\Shift;

use Validator, Str;


class ShiftController extends Controller
{
    public function getShift(){
    	$shiftsCatch = Shift::orderBy('created_at', 'Desc')->get();
    	$data = ['shiftsCatch' => $shiftsCatch];
    	return view('shift.dashshift', $data);  
    }      
    public function postShiftAdd(Request $request){
    	$rules = [
    		'selectshift' => 'required'
    	];
    	$messages = [
    		'selectshift.required' => 'Se necesita seleccionar un trámite para pasar, por favor!.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al seleccionar el trámite. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:

			//Variables
			$inicioLetra = "A";
			$finalLetra = "Z";
			$inicioNumero = 1;
			$finalNumero = 100;

    		$letra = chr(rand(ord($inicioLetra), ord($finalLetra)));
			$numero = rand($inicioNumero, $finalNumero);

        	$shift = new Shift;
        	$shift->description = e($letra.$numero);
        	//e($request->input('description'));
        	$shift->slug = Str::slug($letra.$numero);
        	$shift->procedure_id = $request->input('selectshift');

            if( $shift->save() ):
                return redirect('/shiftsshow')->with('message', 'TURNO:'.$shift->description)->with('typealert','success');
            endif; 

        endif;  
    }


}
