<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Image, Auth, Config, Str, Hash;
use App\User;

class PerfilController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    }
    public function getPerfilEdit(){
    	return view('perfil.perfil_edit');
    }
    public function postPerfilAvatar(Request $request){
    	
    	$rules = [
            'avatar' => 'required',
        ];

        $mensajes = [
            
            'avatar.required' => 'Seleccione una imagen.',

        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            if ($request->hasFile('avatar')):
                /* crea una carpeta con nombre de la fecha que se guardo la imagen */
                $path = '/'.Auth::id();
                /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads_user.root');
                $nombre = Str::slug(str_replace($fileExt,'', $request->file('avatar')->getClientOriginalName()));
                $nombre_imagen = rand(1,999).'_'.$nombre.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
               	$u = User::find(Auth::id());
               	$aa = $u->avatar;
               	$u->avatar = $nombre_imagen;
            
            	if($u->save()):
                    if(is_null(Auth::user()->avatar)):
                        if($request->hasFile('avatar')):
                            $fl = $request->avatar->storeAs($path, $nombre_imagen, 'uploads_user');
                            $img = Image::make($file_file);
                            $img->fit(256, 256, function($constraint){
                                        $constraint->upsize();
                                    });
                            $img->orientate();
                            $img->save($upload_path.'/'.$path.'/av_'.$nombre_imagen);

                        endif;
                    else:
                        if($request->hasFile('avatar')):
                            $fl = $request->avatar->storeAs($path, $nombre_imagen, 'uploads_user');
                            $img = Image::make($file_file);
                            $img->fit(256, 256, function($constraint){
                                        $constraint->upsize();
                                    });
                            $img->orientate();
                            $img->save($upload_path.'/'.$path.'/av_'.$nombre_imagen);           
                            unlink($upload_path.'/'.$path.'/'.$aa);
                            unlink($upload_path.'/'.$path.'/av_'.$aa);
                            endif;
                    endif;
                        return back()->with('message', 'Actualizado con ??xito.')->with('typealert', 'success');  

            	endif;
            endif;
        endif;
    }
    public function postPerfilPassword(Request $request){

    	$rules = [
            'apassword' => 'required|min:8',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ];

        $mensajes = [
            
            'apassword.required' => 'Escriba su contrase??a actual.',
            'apassword.min' => 'La contrase??a actual debe tener al menos 8 caracteres.',
            'password.required' => 'Escriba su nueva contrase??a.',
            'password.min' => 'La nueva contrase??a debe tener al menos 8 caracteres.',
			'cpassword.required' => 'Confirme su nueva contrase??a.',
            'cpassword.min' => 'La confirmaci??n de la nueva contrase??a debe tener al menos 8 caracteres.',
            'cpassword.same' => 'Las contrase??a no coinciden.'


        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
        	$u = User::find(Auth::id());
        	if(Hash::check($request->input('apassword'), $u->password)):
        		$u->password = Hash::make($request->input('password'));
        		if($u->save()):
        			return back()->with('message', 'La contrase??a se actualizo con ??xito.')->with('typealert', 'success');
        		endif;

        	else:
        		return back()->with('message', 'Su contrase??a actual es err??nea.')->with('typealert', 'danger');
        	endif;
        endif;
    }
    public function postPerfilInfo(Request $request){
    	$rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|min:8'
        ];

        $mensajes = [
            
            'nombre.required' => 'Su nombre es requerido.',
            'apellido.required' => 'Su apellido es requerido.',
            'celular.required' => 'Su numero de celular es requerido.',
            'celular.min' => 'Su numero de celular debe tener 8 n??meros.'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
        	$u = User::find(Auth::id());
        	$u->nombre = e($request->input('nombre'));
        	$u->apellido = e($request->input('apellido'));
        	$u->celular = e($request->input('celular'));
        	$u->genero = e($request->input('genero'));
        	if($u->save()):
        		return back()->with('message', 'Su informaci??n se actualizo con ??xito.')->with('typealert', 'success');
        	endif;
        endif;
    }
}
