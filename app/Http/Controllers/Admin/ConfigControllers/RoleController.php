<?php

namespace App\Http\Controllers\Admin\ConfigControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\User\Role;

use Validator, Str;

class RoleController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getRoles($id){
    	$rolesCatch = Role::orderBy('created_at','Asc')->get();
    	$data = ['rolesCatch' => $rolesCatch];
    	return view('admin.role.dashrole', $data);
    }
    public function postRoleAdd(Request $request){
    	$rules = [
    		'description' => 'required'
    	];
    	$messages = [
    		'description.required' => 'Se requiere escribir el nuevo trámite.'
    	];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al agregar una role. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
        	$role = new Role;
        	$role->description = e($request->input('description'));
        	$role->slug = Str::slug($request->input('description'));

            if( $role->save() ):
                return back()->with('message', 'Role registrado con éxito!. Ya puedes usar el nuevo trámite!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getRoleEdit($id){
        //GetAllData
            $rolesCatch = Role::orderBy('created_at','Asc')->get();
            $dataTwo = ['rolesCatch' => $rolesCatch];                  
        //

        $roleCatch = Role::find($id);
        $data = ['roleCatch' => $roleCatch];
        return view('admin.role.edit', $data, $dataTwo);
    }   

    public function postRoleEdit(Request $request, $id){
        $rules = [
            'description' => 'required'
        ];
        $messages = [
            'description.required' => 'Se requiere escribir el nuevo role.'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error al modificar un rol. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:
            $role = Role::find($id);
            $role->description = e($request->input('description'));
            $role->slug = Str::slug($request->input('description'));

            if( $role->save() ):
                return back()->with('message', 'Role modificado con éxito!.')->with('typealert','success');
            endif; 

        endif;  
    }

    public function getRoleDelete($id){

        $role = Role::find($id);
        if( $role->delete() ):
            return back()->with('message', 'Role eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
