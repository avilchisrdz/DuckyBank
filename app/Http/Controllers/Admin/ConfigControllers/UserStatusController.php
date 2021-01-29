<?php

namespace App\Http\Controllers\Admin\ConfigControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\User\UserStatus;;

use Validator, Str;

class UserStatusController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getUserStatuses($id){
    	$userStatusesCatch = UserStatus::orderBy('created_at','Desc')->get();
    	$data = ['userStatusesCatch' => $userStatusesCatch];
    	return view('admin.configuration.userstatus.dashuserstatus', $data);
    }
    public function postUserStatusAdd(Request $request){
    	$rules = [
    		'description' => 'required'
    	];
    	$messages = [
    		'description.required' => 'Se requiere escribir el nuevo estado de usuario.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al agregar un estado. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
        	$userstatus = new UserStatus;
        	$userstatus->description = e($request->input('description'));
        	$userstatus->slug = Str::slug($request->input('description'));

            if( $userstatus->save() ):
                return back()->with('message', 'Estado registrado con éxito!. Ya puedes usar el nuevo estado!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getUserStatusEdit($id){
        //GetAllData
            $userStatusesCatch = UserStatus::orderBy('created_at','Desc')->get();
            $dataTwo = ['userStatusesCatch' => $userStatusesCatch];                  
        //

        $userStatusCatch = UserStatus::find($id);
        $data = ['userStatusCatch' => $userStatusCatch];
        return view('admin.configuration.userstatus.edit', $data, $dataTwo);
    }   

    public function postUserStatusEdit(Request $request, $id){
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
            $userstatus = UserStatus::find($id);
            $userstatus->description = e($request->input('description'));
            $userstatus->slug = Str::slug($request->input('description'));

            if( $userstatus->save() ):
                return back()->with('message', 'Estado modificado con éxito!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getUserStatusDelete($id){

        $userstatus = UserStatus::find($id);
        if( $userstatus->delete() ):
            return back()->with('message', 'Estado eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
