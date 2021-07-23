<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator, Image, Auth, Config, Str, Hash;

class UserController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');
    }
    public function getUsers($status){
        if($status == 'all'):
    	$users = User::orderBy('id', 'Desc')->paginate(25);
        else:
           $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25); 
        endif;
    	$data = ['usuarios' => $users];
    	return view('admin.usuarios.home', $data);
    }
    public function getUsersEdit($id){
    	$u = user::findOrfail($id);
    	$data = ['u' => $u];
    	return view('admin.usuarios.edit', $data);
    }
    public function getUsersBanear($id){
        $u = user::findOrfail($id);
        if($u->status == "100"):
            $u->status = "0";
            $mensaje = "Usuario activado.";
        else:
            $u->status = "100";
            $mensaje = "Usuario suspendido con éxito.";
        endif;
        if($u->save()):
            return back()->with('message',$mensaje)->with('typealert', 'success');
        endif;
    }   
    public function getUsersPermiso($id){
        $u = User::findOrFail($id);
        $data = ['u'=>$u];
        return view('admin.usuarios.permiso', $data);
    }    
    public function postUsersPermiso(Request $request, $id){
        $u = User::findOrFail($id);
        $u->permisos = $request->except(['_token']);
        if($u->save()):
            return back()->with('message','Los permisos del usuario fueron actualizados con éxito.')->with('typealert','success');
        endif;
    }
    public function postUsersEdit(Request $request, $id){
        $u = User::findOrFail($id);
        $u->role = $request->input('user_tipo');
        if($request->input('user_tipo') == "1"):
            if(is_null($u->permisos)):
                $permisos = [
                    'dashboard' => true,
                    'dashboard_ver_estadisticas' => true
                ];
                $permisos = json_encode($permisos);
                $u->permisos = $permisos;
            endif;
        else:
            $u->permisos = null;
        endif;
        if($u->save()):
            if($request->input('user_tipo') == "1"):
                return redirect('/admin/usuarios/'.$u->id.'/permiso')->with('message','El rol del usuario se actualizo.')->with('typealert', 'success');
            else:
                return back()->with('message','El rol del usuario se actualizo.')->with('typealert', 'success');
            endif;
        endif;
    }
    public function getUsersEliminar($id){
        $p = User::findOrfail($id);
        $upload_path = Config::get('filesystems.disks.uploads_user.root');
        $path = $p->id;
        $aa = $p->avatar;
        unlink($upload_path.'/'.$path.'/'.$aa);
        unlink($upload_path.'/'.$path.'/av_'.$aa);
        if($p->delete()):
            return back()->with('message','Eliminado Con Exito.')->with('typealert','danger');
        endif;
    }
}
