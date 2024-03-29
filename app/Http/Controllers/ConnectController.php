<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\Http\Models\User\User;

class ConnectController extends Controller
{ 
    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
    	return view('connect.login');
    }
    public function getRegister(){
        return view('connect.register');
    } 
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ];        
        $messages = [
            'email.required' => 'Su e-mail es necesario.',
            'email.email' => 'El formato del e-mail no es válido.',
            'password.required' => 'Por favor, escriba su contraseña.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails() ): 
            return back()->withErrors($validator)->with('message', 'Error de inicio de sesión. Por favor verifique lo siguiente: ')->with('typealert','danger');
        else:

            if( Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role_id' => '1' ], true) ){
                return redirect('/admin');
            }
            else if( Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role_id' => '2' ], true)  ){
                return redirect('/cashieradmin');
            } 
            else{
                return back()->with('message', 'E-mail o contraseña incorrecta.')->with('typealert','danger');                
            }
        endif; 
    }     
    public function postRegister(Request $request){
    	$rules = [
    		'rfc' => 'required',
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email',
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
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if( $user->save() ):
                return redirect('/login')->with('message', 'Se ha registrado con éxito. Intente iniciar sesión.')->with('typealert','success');
            endif;  

    	endif; 	
    	//return view('connect.register');
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/login'); //MODIF
    }

    public function getRecover(){
        //   
    }
}
