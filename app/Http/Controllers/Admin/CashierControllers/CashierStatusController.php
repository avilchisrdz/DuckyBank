<?php

namespace App\Http\Controllers\Admin\CashierControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Cashier\CashierStatus;

use Validator, Str;

class CashierStatusController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getCashierStatuses($id){
    	$cashierStatusesCatch = CashierStatus::orderBy('created_at','Asc')->get();
    	$data = ['cashierStatusesCatch' => $cashierStatusesCatch];
    	return view('admin.cashier.cashierstatus.dashcashierstatus', $data);
    }
    public function postCashierStatusAdd(Request $request){
    	$rules = [
    		'description' => 'required'
    	];
    	$messages = [
    		'description.required' => 'Se requiere escribir el nuevo estado de cajero.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al agregar un estado. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
        	$cashierstatus = new CashierStatus;
        	$cashierstatus->description = e($request->input('description'));
        	$cashierstatus->slug = Str::slug($request->input('description'));

            if( $cashierstatus->save() ):
                return back()->with('message', 'Estado registrado con éxito!. Ya puedes usar el nuevo estado!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getCashierStatusEdit($id){
        //GetAllData
            $cashierStatusesCatch = CashierStatus::orderBy('created_at','Asc')->get();
            $dataTwo = ['cashierStatusesCatch' => $cashierStatusesCatch];                  
        //

        $cashierStatusCatch = CashierStatus::find($id);
        $data = ['cashierStatusCatch' => $cashierStatusCatch];
        return view('admin.cashier.cashierstatus.edit', $data, $dataTwo);
    }   

    public function postCashierStatusEdit(Request $request, $id){
        $rules = [
            'description' => 'required'
        ];
        $messages = [
            'description.required' => 'Se requiere escribir el nuevo estado.'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al modificar un estado. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
            $cashierstatus = CashierStatus::find($id);
            $cashierstatus->description = e($request->input('description'));
            $cashierstatus->slug = Str::slug($request->input('description'));

            if( $cashierstatus->save() ):
                return back()->with('message', 'Estado modificado con éxito!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getCashierStatusDelete($id){

        $cashierstatus = CashierStatus::find($id);
        if( $cashierstatus->delete() ):
            return back()->with('message', 'Estado eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
