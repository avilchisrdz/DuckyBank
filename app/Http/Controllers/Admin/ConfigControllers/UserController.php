<?php

namespace App\Http\Controllers\Admin\ConfigControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\User\User;

use Validator, Str, Hash;

class UserController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }
    public function getUsers(){
    	$usersCatch = User::orderBy('id','Asc')->get();
    	$data = ['usersCatch' => $usersCatch];

    	return view('admin.configuration.user.dashuser', $data);
    }
    public function postUserAdd(Request $request){
    	$rules = [
    		'rfc' => 'required',
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email',
            'role_id' => 'required',
    		'password' => 'required|min:8',
    		'cpassword' => 'required|min:8|same:password'
    	];
        $messages = [
            'rfc.required' => 'Ingresa rfc.',
            'name.required' => 'Su nombre es necesario.',
            'lastname.required' => 'Su apellido es necesario.',
            'email.required' => 'Su e-mail es necesario.',
            'email.email' => 'El formato del e-mail no es válido.',
            'email.unique' => 'Ya existe un usuario registrado con este e-mail.',
            'role_id' => 'Se requiere el rol a desempeñar.',
            'password.required' => 'Por favor, escriba su contraseña.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'cpassword.required' => 'Por favor, es necesario confirmar su contraseña.',
            'cpassword.min' => 'Recuerde tener mínimo 8 caracteres.',
            'cpassword.same' => 'Por favor, verifique la exactitud de la contraseña.'
        ];


    	$validator = Validator::make($request->all(), $rules, $messages);
    	if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Se ha producido un error. Por favor verifique lo siguiente: ')->with('typealert','danger');
    	else:
            $user = new User;
            $user->rfc = e($request->input('rfc'));
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->role_id = $request->input('role_id');
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if( $user->save() ):
                return redirect('/admin/users/1')->with('message', 'Se ha registrado con éxito.')->with('typealert','success');
            endif;  

    	endif; 	
    }

    public function getUserEdit($id){
        //GetAllData
            $usersCatch = User::orderBy('created_at','Asc')->get();
            $dataTwo = ['usersCatch' => $usersCatch];                  
        //

        $userCatch = User::find($id);
        $data = ['userCatch' => $userCatch];
        return view('admin.configuration.user.edit', $data, $dataTwo);
    }   

    public function postUserEdit(Request $request, $id){
        $rules = [
            'rfc' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ];
        $messages = [
            'rfc.required' => 'Ingresa rfc.',
            'name.required' => 'Su nombre es necesario.',
            'lastname.required' => 'Su apellido es necesario.',
            'role_id' => 'Se requiere el rol a desempeñar.',
            'email.required' => 'Su e-mail es necesario.',
            'email.email' => 'El formato del e-mail no es válido.',
            'email.unique' => 'Ya existe un usuario registrado con este e-mail.',
            'password.required' => 'Por favor, escriba su contraseña.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'cpassword.required' => 'Por favor, es necesario confirmar su contraseña.',
            'cpassword.min' => 'Recuerde tener mínimo 8 caracteres.',
            'cpassword.same' => 'Por favor, verifique la exactitud de la contraseña.'
        ];


    	$validator = Validator::make($request->all(), $rules, $messages);
    	if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Se ha producido un error. Por favor verifique lo siguiente: ')->with('typealert','danger');
    	else:
            $user = User::find($id);
            $user->rfc = e($request->input('rfc'));
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->role_id = $request->input('role_id');
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if( $user->save() ):
                return back()->with('message', 'Se ha modificado con éxito.')->with('typealert','success');             
            endif;  

    	endif; 	
    }

    public function getUserDelete($id){

        $user = User::find($id);
        if( $user->delete() ):
            return back()->with('message', 'Usuario eliminado con éxito!.')->with('typealert','success');
        endif; 
    }

}
