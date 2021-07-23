<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;

use App\Modelos\personal;
use App\Modelos\curso;
use App\Modelos\experiencia;
use App\Modelos\reconocimiento;
use App\Modelos\atenuante;
use App\Modelos\agravante;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Exports\personal_excel;
use Maatwebsite\Excel\Facades\Excel;

class PersonalController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');

    } 
    public function getPersonal($genero){
        switch ($genero){
            case '1':
                $personal = personal::where('genero','1')->orderBy('id', 'desc')->paginate(25);
                break;
            case '2':
                $personal = personal::where('genero','2')->orderBy('id', 'desc')->paginate(25);
                break;
            case '3':
                $personal = personal::whereNotNull('fecha_alt')->orderBy('id', 'desc')->paginate(25);
                break;
            case '4':
                $personal = personal::orderBy('id', 'desc')->paginate(25);
                break;
        }

        $date = ['personal' => $personal];
    	return view('admin.personal.home', $date);
    }
    public function getPersonalAdd(){
    	return view('admin.personal.add');
    }

public function postPersonalAdd(Request $request){
    $personal = new personal();
    $rules = [
        'nombres' => 'required', 'ci' => 'required|unique:personal',
        'exp' => 'required','celular' => 'required','fecha_nac' => 'required',
        'grado' => 'required','seguro' => 'required','fecha_des' => 'required','unidad_des' => 'required', 'cargo_act' => 'required','destino_ant' => 'required','numero_esc' => 'required',
        'antiguedad_grado' => 'required','imagen_per' => 'required|image',
    ];
    $mensajes = [
        'nombres.required' => 'El nombre del Personal es necesario.',
        'ci.required' => 'La Cédula de Indentidad es necesario.',
        'ci.unique' => 'Esta Cédula de Indentidad ya se encuentra registrado.',
        'celular.required' => 'El Número de Celular es necesario.',
        'fecha_nac.required' => 'La fecha de Nacimiento es necesario.',
        'grado.required' => 'El Grado es necesario.',
        'categoria.required' => 'La categoría de la licencia es necesario.',
        'seguro.required' => 'El Número de Seguro es necesario.',
        'fecha_des.required' => 'La fecha de Destino es necesario.',
        'unidad_des.required' => 'La Unidad de Destino es necesario.',
        'cargo_act.required' => 'El Cargo Actual es necesario.',
        'destino_ant.required' => 'El Destino Anterior es necesario.',
        'numero_esc.required' => 'El Número de Escalafón es necesario',
        'antiguedad_grado.required' => 'La Antiguedad en el Grado es necesario.',
        'imagen_per.required' => 'Ingrese la imagen del Personal',
        'imagen_per.image' => 'El archivo subido no es una imagen',
    ];
    $validator = Validator::make($request->all(), $rules, $mensajes);
    if($validator->fails()):
        return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
    else:               
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('imagen_per')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $nombre = Str::slug(str_replace($fileExt, '' , $request->file('imagen_per')->getClientOriginalName()));
        $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
        $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
        $personal->imagen_per = $nombre_imagen;     
        $personal->file_path = date('Y-m-d');       
        $personal->slug = Str::slug($request->input('apellido_pat'));
        $personal->nombres = Str::upper($request->input('nombres'));
        $personal->apellido_pat = Str::upper($request->input('apellido_pat'));
        $personal->apellido_mat = Str::upper($request->input('apellido_mat'));
        $personal->ci = $request->input('ci');
        $personal->exp = Str::upper($request->input('exp'));
        $personal->celular = $request->input('celular');
        $personal->fecha_nac = $request->input('fecha_nac');
        $personal->grado = Str::upper($request->input('grado'));
        $personal->licencia = $request->input('licencia');
        $personal->categoria = Str::upper($request->input('categoria'));
        $personal->seguro = $request->input('seguro');
        $personal->fecha_des = $request->input('fecha_des');
        $personal->fecha_alt = $request->input('fecha_alt');
        $personal->genero = $request->input('genero');
        $personal->unidad_des = Str::upper($request->input('unidad_des'));
        $personal->cargo_act = Str::upper($request->input('cargo_act'));
        $personal->destino_ant = Str::upper($request->input('destino_ant'));
        $personal->numero_esc = Str::upper($request->input('numero_esc'));
        $personal->antiguedad_grado = Str::upper($request->input('antiguedad_grado'));
        $personal->ubicacion = Str::upper($request->input('ubicacion'));
        $personal->referencia = Str::upper($request->input('referencia'));
        if($personal->save()):
            if($request->hasFile('imagen_per')):
                $fl = $request->imagen_per->storeAs($path, $nombre_imagen, 'uploads');
                $img = Image::make($file_file);
                $img->fit(400, 300, function($constraint){
                    $constraint->upsize();
                });
                $img->orientate();
                $img->save($upload_path.'/'.$path.'/t_'.$nombre_imagen);
            endif;
            return redirect('/admin/personal/4')->with('message', 'Guardado con éxito.')->with('typealert', 'success');
        endif;
    endif;     
}
    public function getPersonalEdit($id){
        $p = personal::findOrfail($id);
        $data=['p' => $p];
        return view('admin.personal.edit', $data);
    }
    public function getPersonalEliminar($id){
        $p = personal::findOrfail($id);
        if($p->delete()):
            return back()->with('message','Eliminado Con Exito.')->with('typealert','danger');
        endif;
    }
    public function postPersonalEdit($id, Request $request){
        $personal = personal::findOrfail($id);

        $rules = [
            'nombres' => 'required',
            'exp' => 'required',
            'celular' => 'required',
            'fecha_nac' => 'required',
            'grado' => 'required',
            'seguro' => 'required',
            'fecha_des' => 'required',
            'unidad_des' => 'required',
            'cargo_act' => 'required',
            'destino_ant' => 'required',
            'numero_esc' => 'required',
            'antiguedad_grado' => 'required'

        ];
        $mensajes = [
            'nombres.required' => 'El nombre del Personal es necesario.',
            'exp.required' => 'El departamento de Expido del C.I. es necesario.',
            'celular.required' => 'El Numero de Celular es necesario.',
            'fecha_nac.required' => 'La fecha de Nacimiento es necesario.',
            'grado.required' => 'El Grado es necesario.',
            'seguro.required' => 'El Numero de Seguro es necesario.',
            'fecha_des.required' => 'La fecha de Destino es necesario.',
            'unidad_des.required' => 'La Unidad de Destino es necesario.',
            'cargo_act.required' => 'El Cargo Actual es necesario.',
            'destino_ant.required' => 'El Destino Anterior es necesario.',
            'celular.required' => 'El Numero de Celular es necesario.',
            'numero_esc.required' => 'El Numero de Escalafon es necesario',
            'antiguedad_grado.required' => 'La Antiguedad en el Grado es necesario.'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:  
                    $cambiar_img = $personal->file_path;
                    $cambiar = $personal->imagen_per;
                        
                        if ($request->hasFile('imagen_per')):
                            $path = '/'.date('Y-m-d');
                            $fileExt = trim($request->file('imagen_per')->getClientOriginalExtension());
                            $upload_path = Config::get('filesystems.disks.uploads.root');
                            $nombre = Str::slug(str_replace($fileExt, '' , $request->file('imagen_per')->getClientOriginalName()));
                            $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
                            $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
                            $personal->imagen_per = $nombre_imagen;     
                            $personal->file_path = date('Y-m-d'); 
                        endif;      
                        $personal->nombres = Str::upper($request->input('nombres'));
                        $personal->apellido_pat = Str::upper($request->input('apellido_pat'));
                        $personal->apellido_mat = Str::upper($request->input('apellido_mat'));
                        $personal->ci = $request->input('ci');
                        $personal->exp = Str::upper($request->input('exp'));
                        $personal->celular = $request->input('celular');
                        $personal->fecha_nac = $request->input('fecha_nac');
                        $personal->grado = Str::upper($request->input('grado'));
                        $personal->licencia = $request->input('licencia');
                        $personal->categoria = Str::upper($request->input('categoria'));
                        $personal->seguro = $request->input('seguro');
                        $personal->fecha_des = $request->input('fecha_des');
                        $personal->fecha_alt = $request->input('fecha_alt');
                        $personal->genero = $request->input('genero');
                        $personal->unidad_des = Str::upper($request->input('unidad_des'));
                        $personal->cargo_act = Str::upper($request->input('cargo_act'));
                        $personal->destino_ant = Str::upper($request->input('destino_ant'));
                        $personal->numero_esc = Str::upper($request->input('numero_esc'));
                        $personal->antiguedad_grado = Str::upper($request->input('antiguedad_grado'));
                        $personal->ubicacion = Str::upper($request->input('ubicacion'));
                        $personal->referencia = Str::upper($request->input('referencia'));
                    

                        if($personal->save()):
                            if($request->hasFile('imagen_per')):
                                $fl = $request->imagen_per->storeAs($path, $nombre_imagen, 'uploads');
                                $img = Image::make($file_file);
                                $img->fit(400, 300, function($constraint){
                                    $constraint->upsize();
                                });
                                $img->orientate();
                                $img->save($upload_path.'/'.$path.'/t_'.$nombre_imagen);
                                unlink($upload_path.'/'.$cambiar_img.'/t_'.$cambiar);
                                unlink($upload_path.'/'.$cambiar_img.'/'.$cambiar);
                        endif;
                            return back()->with('message', 'Actualizado con Exito.')->with('typealert', 'success');
                            
                        endif;

        endif;
    }
    public function getPersonalVer($id){
        
        $p = personal::findOrfail($id);
        $data=['p' => $p];
        return view('admin.personal.ver', $data);
    }
    public function postPersonalBuscar(Request $request){
        $rules = [
            'buscar' => 'required'
        ];

        $mensajes = [
            'buscar.required' => 'Se necesita que ingrese el dato de busqueda'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('admin/personal')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $personal = personal::where('ci', $request->input('buscar'))->orderBy('id', 'desc')->paginate(25);
            $data = ['personal' => $personal];
            return view('admin.personal.home', $data);
        endif;
    }
    public function postPersonalCursos(Request $request, $ci){
        $rules = [
            'institucion' => 'required',
            'area' => 'required',
            'detalle' => 'required',
            'duracion' => 'required'
        ];

        $mensajes = [
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'area.required' => 'Se necesita que ingrese el Área de estudio.',
            'detalle.required' => 'Se necesita que ingrese el Detalle.',
            'duracion.required' => 'Se necesita que ingrese la Duración.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $curso = new curso();

            $curso->ci = $ci;
            $curso->institucion = Str::upper($request->input('institucion'));
            $curso->area = Str::upper($request->input('area'));
            $curso->tipo = Str::upper($request->input('tipo'));
            $curso->detalle = Str::upper($request->input('detalle'));
            $curso->horas = Str::upper($request->input('duracion'));
            if($curso->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getPersonalCursoEliminar($id){
        $m = curso::findOrfail($id);
        if($m->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postPersonalCursoEdit(Request $request, $ci, $id){
        $curso = curso::findOrfail($id);
        $rules = [
            'institucion' => 'required',
            'area' => 'required',
            'detalle' => 'required',
            'duracion' => 'required'
        ];

        $mensajes = [
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'area.required' => 'Se necesita que ingrese el Área de estudio.',
            'detalle.required' => 'Se necesita que ingrese el Detalle.',
            'duracion.required' => 'Se necesita que ingrese la Duración.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $curso->ci = $ci;
            $curso->institucion = Str::upper($request->input('institucion'));
            $curso->area = Str::upper($request->input('area'));
            $curso->tipo = Str::upper($request->input('tipo'));
            $curso->detalle = Str::upper($request->input('detalle'));
            $curso->horas = Str::upper($request->input('duracion'));
            if($curso->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function postPersonalExperiencia(Request $request, $ci){
        $rules = [
            'institucion' => 'required',
            'cargo' => 'required',
            'tiempo' => 'required',
        ];

        $mensajes = [
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'cargo.required' => 'Se necesita que ingrese el Cargo o Funciones desempeñadas.',
            'tiempo.required' => 'Se necesita que ingrese el Tiempo de trabajo.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $experiencia = new experiencia();

            $experiencia->ci = $ci;
            $experiencia->institucion = Str::upper($request->input('institucion'));
            $experiencia->cargo = Str::upper($request->input('cargo'));
            $experiencia->tiempo = Str::upper($request->input('tiempo'));
            $experiencia->referencia = Str::upper($request->input('referencia'));
            $experiencia->detalle = Str::upper($request->input('detalle'));
            if($experiencia->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function postPersonalExperienciaEdit(Request $request, $ci, $id){
        $experiencia = experiencia::findOrfail($id);
        $rules = [
            'institucion' => 'required',
            'cargo' => 'required',
            'tiempo' => 'required',
        ];

        $mensajes = [
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'cargo.required' => 'Se necesita que ingrese el Cargo o Funciones desempeñadas.',
            'tiempo.required' => 'Se necesita que ingrese el Tiempo de trabajo.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $experiencia->ci = $ci;
            $experiencia->institucion = Str::upper($request->input('institucion'));
            $experiencia->cargo = Str::upper($request->input('cargo'));
            $experiencia->tiempo = Str::upper($request->input('tiempo'));
            $experiencia->referencia = Str::upper($request->input('referencia'));
            $experiencia->detalle = Str::upper($request->input('detalle'));
            if($experiencia->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;        

    }
    public function getPersonalExperienciaEliminar($id){
        $e = experiencia::findOrfail($id);
        if($e->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postPersonalReconocimiento(Request $request, $ci){
        $rules = [
            'fecha' => 'required',
            'institucion' => 'required',
            'merito' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'merito.required' => 'Se necesita que ingrese el Mérito.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $reconocimiento = new reconocimiento();

            $reconocimiento->ci = $ci;
            $reconocimiento->fecha = $request->input('fecha');
            $reconocimiento->institucion = Str::upper($request->input('institucion'));
            $reconocimiento->merito = Str::upper($request->input('merito'));
            $reconocimiento->detalle = Str::upper($request->input('detalle'));
            if($reconocimiento->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function postPersonalReconocimientoEdit(Request $request, $ci, $id){
        $reconocimiento = reconocimiento::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'institucion' => 'required',
            'merito' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'institucion.required' => 'Se necesita que ingrese la Institución.',
            'merito.required' => 'Se necesita que ingrese el Mérito.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $reconocimiento->ci = $ci;
            $reconocimiento->fecha = $request->input('fecha');
            $reconocimiento->institucion = Str::upper($request->input('institucion'));
            $reconocimiento->merito = Str::upper($request->input('merito'));
            $reconocimiento->detalle = Str::upper($request->input('detalle'));
            if($reconocimiento->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getPersonalReconocimientoEliminar($id){
        $r = reconocimiento::findOrfail($id);
        if($r->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postPersonalAtenuante(Request $request, $ci){
        $rules = [
            'fecha' => 'required',
            'texto' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'texto.required' => 'Se necesita que ingrese el Atenuante.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $atenuante = new atenuante();

            $atenuante->ci = $ci;
            $atenuante->fecha = $request->input('fecha');
            $atenuante->atenuante = Str::upper($request->input('texto'));
            if($atenuante->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function postPersonalAtenuanteEdit(Request $request, $ci, $id){
        $atenuante = atenuante::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'texto' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'texto.required' => 'Se necesita que ingrese el Atenuante.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $atenuante->ci = $ci;
            $atenuante->fecha = $request->input('fecha');
            $atenuante->atenuante = Str::upper($request->input('texto'));
            if($atenuante->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getPersonalAtenuanteEliminar($id){
        $at = atenuante::findOrfail($id);
        if($at->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postPersonalAgravante(Request $request, $ci){
        $rules = [
            'fecha' => 'required',
            'texto' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'texto.required' => 'Se necesita que ingrese el Agravante.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $agravante = new agravante();

            $agravante->ci = $ci;
            $agravante->fecha = $request->input('fecha');
            $agravante->agravante = Str::upper($request->input('texto'));
            if($agravante->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function postPersonalAgravanteEdit(Request $request, $ci, $id){
        $agravante = agravante::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'texto' => 'required',
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la Fecha.',
            'texto.required' => 'Se necesita que ingrese el Agravante.',
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $agravante->ci = $ci;
            $agravante->fecha = $request->input('fecha');
            $agravante->agravante = Str::upper($request->input('texto'));
            if($agravante->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getPersonalAgravanteEliminar($id){
        $ag = agravante::findOrfail($id);
        if($ag->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function getDownloadWORD($id){
        $p = personal::findOrfail($id);
        $templateProcessor = new TemplateProcessor('exportar/personal.docx');

        $templateProcessor->setValue('nombres', $p->nombres);
        $templateProcessor->setValue('apellido_pat', $p->apellido_pat);
        $templateProcessor->setValue('apellido_mat', $p->apellido_mat);
        $templateProcessor->setValue('ci', $p->ci);
        $templateProcessor->setValue('expedido', getDepartamentoArrayKey($p->exp));
        $templateProcessor->setValue('celular', $p->celular);
        $templateProcessor->setValue('color', $p->color);
        $templateProcessor->setValue('fecha_nac', $p->fecha_nac);
        $templateProcessor->setValue('grado', $p->grado);
        $templateProcessor->setValue('licencia', $p->licencia);
        $templateProcessor->setValue('seguro', $p->seguro);
        $templateProcessor->setValue('fecha_des', $p->fecha_des);
        $templateProcessor->setValue('fecha_alt', $p->fecha_alt);
        $templateProcessor->setValue('unidad_des', $p->unidad_des);
        $templateProcessor->setValue('cargo_act', $p->cargo_act);
        $templateProcessor->setValue('destino_ant', $p->destino_ant);
        $templateProcessor->setValue('numero_esc', $p->numero_esc);
        $templateProcessor->setValue('antiguedad_grado', $p->antiguedad_grado);
        $templateProcessor->setValue('genero', getGeneroArrayKey($p->genero));
        $templateProcessor->setValue('categoria', $p->categoria);
        $templateProcessor->setValue('ubicacion', $p->ubicacion);
        $templateProcessor->setValue('referencia', $p->referencia);

        $curso = curso::where('ci',$p->ci)->count();
        if($curso == 0):
            $templateProcessor->setValue('institucionc', '');
            $templateProcessor->setValue('areac', '');
            $templateProcessor->setValue('tipoc', '');
            $templateProcessor->setValue('detallec', '');
            $templateProcessor->setValue('horasc', '');
        else:
            foreach($p->getcurso as $c){
            $valuesc[] = ['institucionc' => $c->institucion, 'areac' => $c->area,'tipoc' => $c->tipo,'detallec' => $c->detalle,'horasc' => $c->horas];
            }
            $templateProcessor->cloneRowAndSetValues('institucionc', $valuesc);
        endif;
        
        $experiencia = experiencia::where('ci',$p->ci)->count();
        if($experiencia == 0):
            $templateProcessor->setValue('institucione', '');
            $templateProcessor->setValue('cargoe', '');
            $templateProcessor->setValue('tiempoe', '');
            $templateProcessor->setValue('referenciae', '');
            $templateProcessor->setValue('detallee', '');
        else:
            foreach($p->getexperiencia as $e){
            $valuese[] =['institucione' => $e->institucion, 'cargoe' => $e->cargo,'tiempoe' => $e->tiempo,'referenciae' => $e->referencia,'detallee' => $e->detalle];
            }
            $templateProcessor->cloneRowAndSetValues('institucione', $valuese);
        endif;
        
        $reconocimiento = reconocimiento::where('ci',$p->ci)->count();
        if($reconocimiento == 0):
            $templateProcessor->setValue('fechar', '');
            $templateProcessor->setValue('institucionr', '');
            $templateProcessor->setValue('meritor', '');
            $templateProcessor->setValue('detaller', '');
        else:
            foreach($p->getreconocimiento as $r){
            $valuesr[] =['fechar' => $r->fecha, 'institucionr' => $r->institucion,'meritor' => $r->merito,'detaller' => $r->detalle];
            }
            $templateProcessor->cloneRowAndSetValues('fechar', $valuesr);
        endif;
        
        $atenuante = atenuante::where('ci',$p->ci)->count();
        if($atenuante == 0):
            $templateProcessor->setValue('fechaat', '');
            $templateProcessor->setValue('atenuanteat', '');
        else:
            foreach($p->getatenuante as $at){
            $valuesat[] =['fechaat' => $at->fecha, 'atenuanteat' => $at->atenuante];
            }
            $templateProcessor->cloneRowAndSetValues('fechaat', $valuesat);
        endif;
        
        $agravante = agravante::where('ci',$p->ci)->count();
        if($agravante == 0):
            $templateProcessor->setValue('fechaag', '');
            $templateProcessor->setValue('agravanteag', '');
        else:
            foreach($p->getagravante as $ag){
            $valuesag[] =['fechaag' => $ag->fecha, 'agravanteag' => $ag->agravante];
            }
            $templateProcessor->cloneRowAndSetValues('fechaag', $valuesag);
        endif;

        
        $templateProcessor->setImageValue('imagen_per', array('path' => public_path('/imagenes/uploads/'.$p->file_path.'/t_'.$p->imagen_per), 'width' => 250, 'height' => 300, 'ratio' => false));
        
        $fileName = $p->ci;
        $templateProcessor->saveAs($fileName. '.docx');
        return response()->download($fileName. '.docx')->deleteFileAfterSend(true);
    }
    public function getDownloadEXCEL(){
        return Excel::download(new personal_excel, 'personal.xlsx');
    }
}

