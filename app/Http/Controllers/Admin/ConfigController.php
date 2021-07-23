<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image, Auth;
use App\Modelos\slider;

class ConfigController extends Controller
{
	public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');
    }
    public function getConfig(){
        $slider = slider::orderBy('orden', 'asc')->get();
        $data = ['slider' => $slider];
    	return view('admin.configuracion.config',$data);
    }
    public function postConfig(Request $request){
    	if(!file_exists(config_path().'/bomberos.php')):
    		fopen(config_path().'/bomberos.php','w');
    	endif;

    	$file = fopen(config_path().'/bomberos.php','w');

    	fwrite($file, '<?php'.PHP_EOL);
    	fwrite($file, 'return ['.PHP_EOL);
    	foreach ($request->except(['_token']) as $key => $value):
    		if(is_null($value)):
    			fwrite($file, '\''.$key. '\' => \'\','.PHP_EOL);
    		else:
    			fwrite($file, '\''.$key. '\' => \''.$value.'\','.PHP_EOL);
    		endif;
    	endforeach;
    	fwrite($file, ']'.PHP_EOL);
    	fwrite($file, '?>'.PHP_EOL);
    	fclose($file);
    	return back()->with('message','Las configuraciones fueron guardadas con éxito.')->with('typealert','success');
    }
    public function postSliderAdd(Request $request){
        $rules = [
            'nombre' => 'required',
            'imagen' => 'required',
            'orden' => 'required'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido.',
            'imagen.required' => 'Selecione una imagen.',
            'orden.required' => 'Es necesario definir un orden de aparición.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else: 
            $path = '/'.date('Y-m-d');
            /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
            $fileExt = trim($request->file('imagen')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $nombre = Str::slug(str_replace($fileExt,'', $request->file('imagen')->getClientOriginalName()));
            $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;

            $slider = new slider;
            $slider->user_id = Auth::id();
            $slider->visible = $request->input('visible');
            $slider->nombre =e($request->input('nombre'));
            $slider->file_path = date('Y-m-d');
            $slider->file_name = $nombre_imagen;
            $slider->contenido = e($request->input('contenido'));
            $slider->orden = e($request->input('orden'));
            if($slider->save()):
                if($request->hasFile('imagen')):
                        $fl = $request->imagen->storeAs($path, $nombre_imagen, 'uploads');
                        
                endif;
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }
    public function getSliderEdit($id){
        $slider = slider::findOrFail($id);
        $data = ['slider' => $slider];
        return view('admin.configuracion.slider', $data);
    }
    public function postSliderEdit(Request $request, $id){
        $rules = [
            'nombre' => 'required',
            'orden' => 'required'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido.',
            'orden.required' => 'Es necesario definir un orden de aparición.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else: 

            $slider = slider::findOrFail($id);
            $slider->visible = $request->input('visible');
            $slider->nombre =e($request->input('nombre'));
            $slider->contenido = e($request->input('contenido'));
            $slider->orden = e($request->input('orden'));
            if($slider->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }
    public function getSliderEliminar($id){
        $slider = slider::findOrFail($id);
        $cambiar_img = $slider->file_path;
        $cambiar = $slider->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        unlink($upload_path.'/'.$cambiar_img.'/'.$cambiar);
        if($slider->delete()):
            return back()->with('message', 'Eliminado con éxito.')->with('typealert', 'success');
        endif;
    }
}
