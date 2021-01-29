<?php

namespace App\Http\Controllers\Admin\CashierControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Cashier\Cashier;

use Validator, Str;

class CashierController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getCashiers($id){
    	$cashiersCatch = Cashier::orderBy('created_at','Asc')->get();
    	$data = ['cashiersCatch' => $cashiersCatch];
    	return view('admin.cashier.dashcashier', $data);
    }
    public function postCashierAdd(Request $request){
    	$rules = [
    		'description' => 'required'
    	];
    	$messages = [
    		'description.required' => 'Se requiere escribir el nuevo cajero.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al agregar un estado de cajero. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
        	$cashier = new Cashier;
        	$cashier->description = e($request->input('description'));
        	$cashier->slug = Str::slug($request->input('description'));

            if( $cashier->save() ):
                return back()->with('message', 'Trámite registrado con éxito!. Ya puedes usar el nuevo estado de cajero!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getCashierEdit($id){
        //GetAllData
            $proceduresCatch = Cashier::orderBy('created_at','Asc')->get();
            $dataTwo = ['proceduresCatch' => $proceduresCatch];                  
        //

        $procedureCatch = Cashier::find($id);
        $data = ['procedureCatch' => $procedureCatch];
        return view('admin.cashier.edit', $data, $dataTwo);
    }   

    public function postCashierEdit(Request $request, $id){
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
            $cashier = Cashier::find($id);
            $cashier->description = e($request->input('description'));
            $cashier->slug = Str::slug($request->input('description'));

            if( $cashier->save() ):
                return back()->with('message', 'Trámite modificado con éxito!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getCashierDelete($id){

        $cashier = Cashier::find($id);
        if( $cashier->delete() ):
            return back()->with('message', 'Trámite eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
