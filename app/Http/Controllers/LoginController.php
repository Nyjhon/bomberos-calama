<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str;
use App\User;
use App\Mail\UserSendRecuperar;
use App\Mail\UserSendNuevoPassword;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['getCerrar']);
    }


    public function getIngreso(){
        return view('login.ingreso');
    }

    public function getRegistro(){
        return view('login.registro');
    }
    public function postIngreso(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $mensajes = [
            'email.required' => 'El campo correo electrónico es requerida.',
            'email.email' => 'El formato del correo electrónico es invalido.',
            'password.required' => 'Por favor introdusca una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger');
        else:
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                if (Auth::user()->status =="100"):
                    return redirect('/cerrar');
                else:
                    return redirect('/');
                endif;
            else:
                return back()->with('message','Correo electrónico o contraseña invalido')->with('typealert', 'danger');
            endif;
        endif;
    }

    public function postRegistro(Request $request){
        $rules =[
        		'nombre' => 'required',
        		'apellido' =>'required',
        		'email' =>'required|email|unique:users,email',
        		'password' => 'required|min:8',
        		'cpassword' => 'required|min:8|same:password'
        ];
        $mensajes = [
            'nombre.required' => 'El campo nombre es requerida.',
            'apellido.required' => 'El campo apellido es requerida.',
            'email.required' => 'El campo correo electrónico es requerida.',
            'email.email' => 'El formato del correo electrónico es invalido.',
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',
            'password.required' => 'Por favor introduzca una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'cpassword.required' => 'Es necesario confirmar una contraseña.',
            'cpassword.min' => 'La confirmacion de la contraseña debe tener al menos 8 caracteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.'          
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
        	return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger');
        else:
            $user = new User;
            $user->nombre = e($request->input('nombre'));
            $user->apellido = e($request->input('apellido'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if($user->save()):
                return redirect('/ingreso')->with('message', 'Su usuario se creo con éxito, ahora puede iniciar sección')->with('typealert','success'); 
            endif;
    	endif;
    }

    public function getCerrar(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
            return redirect('/ingreso')->with('message', 'Su cuenta fue suspendido.')->with('typealert', 'danger');
        else:
            return redirect('/');
        endif;
    }
    public function getRecuperar(){
        return view('login.recuperar');
    }
    public function postRecuperar(Request $request){
        $rules =[
                'email' =>'required|email'
        ];
        $mensajes = [
            'email.required' => 'El campo correo electrónico es requerida.',
            'email.email' => 'El formato del correo electrónico es invalido.',
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger');
        else:
            $user = User::where('email', $request->input('email'))->count();
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = ['nombre' => $user->nombre, 'email' => $user->email, 'code' => $code];
                $u = User::find($user->id);
                $u->password_code = $code;
                if ($u->save()):
                Mail::to($user->email)->send(new UserSendRecuperar($data));
                return redirect('/reset?email='.$user->email)->with('message', 'Ingrese el código enviado a su correo electrónico.')->with('typealert', 'success');
                endif;
                // return view('email.recuperar_contraseña', $data);
            else:
                return back()->with('message', 'Este correo electrónico no existe.')->with('typealert', 'danger');
            endif;    
            
            
        endif;
    }
    public function getReset(Request $request){
        $data = ['email' => $request->get('email')];
        return view('login.reset_contraseña',$data);
    }
    public function postReset(Request $request){
        $rules =[
                'email' =>'required|email',
                'codigo' => 'required'
        ];
        $mensajes = [
            'email.required' => 'El campo correo electrónico es requerida.',
            'email.email' => 'El formato del correo electrónico es invalido.',
            'codigo.required' => 'El código de recuperación es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger');
        else:
            $user = User::where('email', $request->input('email'))->where('password_code', $request->input('codigo'))->count();
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->where('password_code', $request->input('codigo'))->first();
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;
                if($user->save()):
                    $data = ['nombre' => $user->nombre, 'password' => $new_password];
                    Mail::to($user->email)->send(new UserSendNuevoPassword($data));
                    return redirect('/ingreso')->with('message', 'La contraseña fue restablecida con éxito, le enviamos un correo electrónico con su nueva contraseña para que pueda Iniciar sesión.')->with('typealert', 'success');
                endif;
            else:
                return back()->with('message','El correo electrónico o el código de recuperación son erróneos.')->with('typealert', 'danger');

            endif;
        endif;
    }
}
