<?php

namespace App\Http\Controllers\Admin\ProcedureControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Procedure\Procedure;

use Validator, Str;

class ProcedureController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getProcedures($id){
    	$proceduresCatch = Procedure::orderBy('created_at','Asc')->get();
    	$data = ['proceduresCatch' => $proceduresCatch];
    	return view('admin.procedure.dashprocedure', $data);
    }
    public function postProcedureAdd(Request $request){
    	$rules = [
    		'description' => 'required'
    	];
    	$messages = [
    		'description.required' => 'Se requiere escribir el nuevo trámite.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al agregar una trámite. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
        	$procedure = new Procedure;
        	$procedure->description = e($request->input('description'));
        	$procedure->slug = Str::slug($request->input('description'));

            if( $procedure->save() ):
                return back()->with('message', 'Trámite registrado con éxito!. Ya puedes usar el nuevo trámite!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getProcedureEdit($id){
        //GetAllData
            $proceduresCatch = Procedure::orderBy('created_at','Asc')->get();
            $dataTwo = ['proceduresCatch' => $proceduresCatch];                  
        //

        $procedureCatch = Procedure::find($id);
        $data = ['procedureCatch' => $procedureCatch];
        return view('admin.procedure.edit', $data, $dataTwo);
    }   

    public function postProcedureEdit(Request $request, $id){
        $rules = [
            'description' => 'required'
        ];
        $messages = [
            'description.required' => 'Se requiere escribir el nuevo trámite.'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al modificar una trámite. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
            $procedure = Procedure::find($id);
            $procedure->description = e($request->input('description'));
            $procedure->slug = Str::slug($request->input('description'));

            if( $procedure->save() ):
                return back()->with('message', 'Trámite modificado con éxito!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getProcedureDelete($id){

        $procedure = Procedure::find($id);
        if( $procedure->delete() ):
            return back()->with('message', 'Trámite eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
