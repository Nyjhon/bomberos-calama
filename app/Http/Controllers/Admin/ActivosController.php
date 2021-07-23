<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Exports\activo_excel;
use Maatwebsite\Excel\Facades\Excel;

use App\Modelos\activo;

class ActivosController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permisos');
    	$this->middleware('isadmin');

    }
    public function getActivos($estado){
        switch ($estado){
            case '1':
                $activos = activo::where('estado','1')->orderBy('id', 'desc')->paginate(25);
                break;
            case '2':
                $activos = activo::where('estado','2')->orderBy('id', 'desc')->paginate(25);
                break;
            case '3':
                $activos = activo::where('estado','3')->orderBy('id', 'desc')->paginate(25);
                break;
            case '4':
                $activos = activo::where('estado','4')->orderBy('id', 'desc')->paginate(25);
                break;
            case '5':
                $activos = activo::orderBy('id', 'desc')->paginate(25);
                break;
        }

        $data = ['activos' => $activos];
    	return view('admin.activos.home', $data);
    }
    public function getActivosAdd(){
        return view('admin.activos.add');
    }
    public function postActivosAdd(Request $request){
        $activo = new activo();   
        $rules = [
            'codigo' => 'required|unique:activos',
            'nombre' => 'required',
            'fecha_ing' => 'required',
            'descripcion' => 'required',
            'nombre_res' => 'required',
            'imagen_act' => 'required|image',
            'procedencia' => 'required',
            'documento_res' => 'required',
        ];
        $mensajes = [
            'codigo.required' => 'El codigo del Activo es necesario',
            'codigo.unique' => 'El codigo del Activo ya se encuentra registrado',
            'nombre.required' => 'El nombre del Activo es necesario',
            'fecha_ing.required' => 'La fecha de ingreso del Activo es necesario',
            'descripcion.required' => 'Una pequeña descripcion del Activo es necesario',
            'nombre_res.required' => 'El nombre del responsable del Activo es necesario',
            'imagen_act.required' => 'Ingrese la imagen del Activo',
            'imagen_act.image' => 'El archivo subido no es una imagen',
            'procedencia.required' => 'La procedencia del Activo es necesario',
            'documento_res.required' => 'El documento de respaldo del Activo es necesario'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            /* crea una carpeta con nombre de la fecha que se guardo la imagen */
            $path = '/'.date('Y-m-d');
            /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
            $fileExt = trim($request->file('imagen_act')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $nombre = Str::slug(str_replace($fileExt,'', $request->file('imagen_act')->getClientOriginalName()));
            $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
            $activo->imagen_act = $nombre_imagen;
            $activo->file_path = date('Y-m-d');
            $activo->slug = Str::slug($request->input('nombre'));
            $activo->nombre = Str::upper($request->input('nombre'));
            $activo->codigo = Str::upper($request->input('codigo'));
            $activo->fecha_ing = $request->input('fecha_ing');
            $activo->fecha_alt = $request->input('fecha_alt');
            $activo->estado = Str::upper($request->input('estado'));
            $activo->descripcion = Str::upper($request->input('descripcion'));
            $activo->nombre_res = Str::upper($request->input('nombre_res'));
            $activo->procedencia = Str::upper($request->input('procedencia'));
            $activo->documento_res = Str::upper($request->input('documento_res'));
            if($activo->save()):
                    if($request->hasFile('imagen_act')):
                        $fl = $request->imagen_act->storeAs($path, $nombre_imagen, 'uploads');
                        $img = Image::make($file_file);
                        $img->fit(256, 256, function($constraint){
                                    $constraint->upsize();
                                });
                        $img->save($upload_path.'/'.$path.'/t_'.$nombre_imagen);
                    endif;
            return redirect('/admin/activos/5')->with('message', 'Guardado con éxito.')->with('typealert', 'success');    
            endif;
        endif;
    }
    public function getActivosEdit($id){
        $p = activo::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.activos.edit', $data);
    }
    public function getActivosEliminar($id){
        $p = activo::findOrfail($id);
        if ($p->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postActivosEdit(Request $request, $codigo, $id){
        $activo = activo::findOrfail($id);
        $rules = [
            'nombre' => 'required',
            'fecha_ing' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
            'nombre_res' => 'required',
            'procedencia' => 'required',
            'documento_res' => 'required'
        ];

        $mensajes = [
            'nombre.required' => 'El nombre del Activo es necesario',
            'fecha_ing.required' => 'La fecha de ingreso del Activo es necesario',
            'estado.required' => 'El estado del Activo es necesario',
            'descripcion.required' => 'Una pequeña descripcion del Activo es necesario',
            'nombre_res.required' => 'El nombre del responsable del Activo es necesario',
            'imagen_act.image' => 'El archivo subido no es una imagen',
            'procedencia.required' => 'La procedencia del Activo es necesario',
            'documento_res.required' => 'El documento de respaldo del Activo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
                $cambiar_img = $activo->file_path;
                $cambiar = $activo->imagen_act;
            if ($request->hasFile('imagen_act')):
                /* crea una carpeta con nombre de la fecha que se guardo la imagen */
                $path = '/'.date('Y-m-d');
                /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
                $fileExt = trim($request->file('imagen_act')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $nombre = Str::slug(str_replace($fileExt,'', $request->file('imagen_act')->getClientOriginalName()));
                $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
                $activo->imagen_act = $nombre_imagen;
                $activo->file_path = date('Y-m-d');
            endif;
        
            $activo->nombre = Str::upper($request->input('nombre'));
            $activo->codigo = Str::upper($codigo);
            $activo->fecha_ing = $request->input('fecha_ing');
            $activo->fecha_alt = $request->input('fecha_alt');
            $activo->estado = Str::upper($request->input('estado'));
            $activo->descripcion = Str::upper($request->input('descripcion'));
            $activo->nombre_res = Str::upper($request->input('nombre_res'));
            $activo->procedencia =Str::upper($request->input('procedencia'));

            if($activo->save()):
                    if($request->hasFile('imagen_act')):
                        
                        $fl = $request->imagen_act->storeAs($path, $nombre_imagen, 'uploads');
                        $img = Image::make($file_file);
                        $img->fit(256, 256, function($constraint){
                                    $constraint->upsize();
                                });
                        $img->save($upload_path.'/'.$path.'/t_'.$nombre_imagen);
                        unlink($upload_path.'/'.$cambiar_img.'/t_'.$cambiar);
                        unlink($upload_path.'/'.$cambiar_img.'/'.$cambiar);
                    endif;
                        return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');    
            endif;


        endif;
    }


    public function getActivosVer($id){
        $p = activo::findOrfail($id);
        $data=['p' => $p];
        return view('admin.activos.ver', $data);
    }
    public function postActivosBuscar(Request $request){
        $rules = [
            'buscar' => 'required'
        ];

        $mensajes = [
            'buscar.required' => 'Se necesita que ingrese el dato de busqueda'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/activos/4')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $codigo = Str::upper($request->get('buscar'));
            $activos = activo::where('codigo', $codigo)->orderBy('id', 'desc')->paginate(25);
            $data = ['activos' => $activos];
            return view('admin.activos.home', $data);
        endif;
    }
    public function getDownloadWORD($id){
        $p = activo::findOrfail($id);

        $templateProcessor = new TemplateProcessor('exportar/activo.docx');
        
        $templateProcessor->setValue('codigo', $p->codigo);
        $templateProcessor->setValue('nombre', $p->nombre);
        $templateProcessor->setValue('estado', getEstadoActivoKey($p->estado));
        $templateProcessor->setValue('fecha_ing', $p->fecha_ing);
        $templateProcessor->setValue('procedencia', $p->procedencia);
        $templateProcessor->setValue('fecha_alt', $p->fecha_alt);
        $templateProcessor->setValue('nombre_res', $p->nombre_res);
        $templateProcessor->setValue('documento_res', $p->documento_res);
        $templateProcessor->setValue('descripcion', $p->descripcion);

        $templateProcessor->setImageValue('imagen_act',  array('path' => public_path('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_act), 'width' => 350, 'height' => 350, 'ratio' => false)); 

        $fileName = $p->codigo;
        $templateProcessor->saveAs($fileName. '.docx');
        return response()->download($fileName. '.docx')->deleteFileAfterSend(true);
    }
    public function getDownloadEXCEL($estado){
        return Excel::download(new activo_excel, 'activos.xlsx');
                
    }
}

