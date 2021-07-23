<?php

namespace App\Http\Controllers\Admin\casos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;
use App\Exports\bombero_excel;
use App\Exports\bombero_mes;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

use App\Modelos\bombero;

class BomberosController extends Controller
{
    //
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');
    } 
    public function getBomberosHome(){
        $contar = bombero::where('fecha_suc',\Carbon\Carbon::yesterday())->count();
        $bombero = bombero::where('fecha_suc',\Carbon\Carbon::yesterday())->orderBy('id', 'desc')->paginate(25);
        $date = ['bomberos' => $bombero, 'contar' => $contar];
    	return view('admin.casos.bomberosHome', $date);
    }
    public function getBomberosAdd(){
    	return view('admin.casos.bomberosAdd');
    }
    public function postBomberosAdd(Request $request){
        
        $bombero = new bombero();

        $rules = ['fecha_suc' => 'required',
                  'hora_suc' => 'required',
                  'localidad' => 'required',
                  'unidad' => 'required',
                  'zona' => 'required',
                  'calle' => 'required',
                  'coordenadas' => 'required',
                  'causa' => 'required',
                  'nombre_policia' => 'required'
                ];

        $mensajes = [
                    'fecha_suc.required' => 'La fecha es requerido',
                    'hora_suc.required' => 'La hora es requerido',
                    'localidad.required' => 'La localidad es requerido',
                    'unidad.required' => 'La unidad/sub estación es requerido',
                    'zona.required' => 'La zona o barrio es requerido',
                    'calle.required' => 'El lugar del hecho calle y/o avenida es requerido',
                    'coordenadas.required' => 'Las coordenadas son requeridas',
                    'causa.required' => 'El Ocurrido en, es requerido',
                    'nombre_policia.required' => 'El nombre del policia es requerido'
                    ];

                    $validator = Validator::make($request->all(), $rules, $mensajes);

                    if($validator->fails()):
                        return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert','danger')->withInput();
                    else:

                        $bombero->fecha_suc = $request->input('fecha_suc');
                        $bombero->hora_suc = Str::upper($request->input('hora_suc'));
                        $bombero->departamento = Str::upper($request->input('departamento'));
                        $bombero->provincia = Str::upper($request->input('provincia'));
                        $bombero->municipio = Str::upper($request->input('municipio'));
                        $bombero->localidad = Str::upper($request->input('localidad'));
                        $bombero->unidad = Str::upper($request->input('unidad'));
                        $bombero->zona = Str::upper($request->input('zona'));
                        $bombero->calle = Str::upper($request->input('calle'));
                        $bombero->coordenadas = $request->input('coordenadas');
                        $bombero->auxilios = Str::upper($request->input('auxilios'));
                        $bombero->causa = Str::upper($request->input('causa'));
                        $bombero->ocurrido = Str::upper($request->input('ocurrido'));
                        $bombero->remitido_lugar = Str::upper($request->input('remitido_lugar'));
                        $bombero->datos_victima = Str::upper($request->input('datos_victima'));
                        $bombero->datos_arrestados = Str::upper($request->input('datos_arrestados'));
                        $bombero->remitido_epi = Str::upper($request->input('remitido_epi'));
                        $bombero->nombre_policia = Str::upper($request->input('nombre_policia'));
                        if($bombero->save()):
                            return redirect('/admin/casos/bomberos')->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
                        endif;

                    endif;  
    }
    public function getBomberosEdit($id){
        $p = bombero::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.bomberosEdit', $data);
    }
    public function getBomberosEliminar($id){
        $p = bombero::findOrfail($id);
        if ($p->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postBomberosEdit($id, Request $request){
        $bombero = bombero::findOrfail($id);

        $rules = ['fecha_suc' => 'required',
                  'hora_suc' => 'required',
                  'localidad' => 'required',
                  'unidad' => 'required',
                  'zona' => 'required',
                  'calle' => 'required',
                  'coordenadas' => 'required',
                  'causa' => 'required',
                  'nombre_policia' => 'required'
                ];

        $mensajes = [
                    'fecha_suc.required' => 'La fecha es requerido',
                    'hora_suc.required' => 'La hora es requerido',
                    'localidad.required' => 'La localidad es requerido',
                    'unidad.required' => 'La unidad/sub estación es requerido',
                    'zona.required' => 'La zona o barrio es requerido',
                    'calle.required' => 'El lugar del hecho calle y/o avenida es requerido',
                    'coordenadas.required' => 'Las coordenadas son requeridas',
                    'causa.required' => 'El Ocurrido en, es requerido',
                    'nombre_policia.required' => 'El nombre del policia es requerido'
                    ];

                    $validator = Validator::make($request->all(), $rules, $mensajes);

                    if($validator->fails()):
                        return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert','danger')->withInput();
                    else:

                        $bombero->fecha_suc = $request->input('fecha_suc');
                        $bombero->hora_suc = Str::upper($request->input('hora_suc'));
                        $bombero->departamento = Str::upper($request->input('departamento'));
                        $bombero->provincia = Str::upper($request->input('provincia'));
                        $bombero->municipio = Str::upper($request->input('municipio'));
                        $bombero->localidad = Str::upper($request->input('localidad'));
                        $bombero->unidad = Str::upper($request->input('unidad'));
                        $bombero->zona = Str::upper($request->input('zona'));
                        $bombero->calle = Str::upper($request->input('calle'));
                        $bombero->coordenadas = $request->input('coordenadas');
                        $bombero->auxilios = Str::upper($request->input('auxilios'));
                        $bombero->causa = Str::upper($request->input('causa'));
                        $bombero->ocurrido = Str::upper($request->input('ocurrido'));
                        $bombero->remitido_lugar = Str::upper($request->input('remitido_lugar'));
                        $bombero->datos_victima = Str::upper($request->input('datos_victima'));
                        $bombero->datos_arrestados = Str::upper($request->input('datos_arrestados'));
                        $bombero->remitido_epi = Str::upper($request->input('remitido_epi'));
                        $bombero->nombre_policia = Str::upper($request->input('nombre_policia'));
                        if($bombero->save()):
                            return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success'); 
                        endif;

                    endif;  
    }
    public function getBomberosVer($id){
        $p = bombero::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.bomberosVer', $data);
    }
    public function postBomberosBuscar(Request $request){
        $rules = [
            'buscar' => 'required'
        ];

        $mensajes = [
            'buscar.required' => 'Se necesita que ingrese el dato de busqueda'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/bomberos')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $fecha_suc = $request->get('buscar');
            $bombero = bombero::where('fecha_suc', $request->input('buscar'))->orderBy('id', 'desc')->paginate(25);
            
            $contar = bombero::where('fecha_suc', request('buscar'))->count();
            $date = ['bomberos' => $bombero, 'contar' => $contar];
            return view('admin.casos.bomberosHome', $date);

        endif;
    }
    public function postBomberosExportar_fecha(Request $request){
        $rules = [
            'exportar' => 'required'
        ];

        $mensajes = [
            'exportar.required' => 'Se necesita que ingrese la fecha de exportar'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/bomberos')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new bombero_excel)->fecha(request('exportar'))->download('bomberos '.Carbon::parse(request('exportar'))->format('d-m-Y').'.xlsx');
        endif;
    }
    public function postBomberosExportar_mes(Request $request){
        $rules = [
            'mes' => 'required',
            'año' => 'required'
        ];

        $mensajes = [
            'mes.required' => 'Se necesita que ingrese el mes de exportación',
            'año.required' => 'Se necesita que ingrese el año de exportación'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/bomberos')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new bombero_mes)->fecha(request('mes'),request('año'))->download('bomberos '.request('mes').'-'.request('año').'.xlsx');
        endif;
    }
    public function getDownloadWORD(Request $request, $id){
        $p = bombero::findOrfail($id);
        $templateProcessor = new TemplateProcessor('exportar/caso-relevante-bom.docx');

        $templateProcessor->setValue('fecha_suc', Carbon::parse($p->fecha_suc)->format('d-m-Y'));
        $templateProcessor->setValue('hora_suc', $p->hora_suc);
        $templateProcessor->setValue('departamento', getDepartamentoArrayKey($p->departamento));
        $templateProcessor->setValue('localidad', $p->localidad);
        $templateProcessor->setValue('zona', $p->zona);
        $templateProcessor->setValue('calle', $p->calle);
        $templateProcessor->setValue('naturaleza', request('naturaleza'));
        $templateProcessor->setValue('funcionario', $p->nombre_policia);
        $templateProcessor->setValue('denunciante', request('denunciante'));
        $templateProcessor->setValue('victimas', request('victimas'));
        $templateProcessor->setValue('fallecidas', request('fallecidas'));
        $templateProcessor->setValue('heridas', request('heridas'));
        $templateProcessor->setValue('vehiculo', request('vehiculo'));
        $templateProcessor->setValue('apoyo', request('apoyo'));
        $templateProcessor->setValue('detalle', request('detalle'));
        $templateProcessor->setValue('daño_personal', request('dañosp'));
        $templateProcessor->setValue('daño_material', request('dañosm'));
        $templateProcessor->setValue('causa_hecho', request('causah'));
        $templateProcessor->setValue('numero', request('numero'));

        $fileName = 'CASO-RELEVANTE';
        $templateProcessor->saveAs($fileName. '.docx');
        return response()->download($fileName. '.docx')->deleteFileAfterSend(true);

    }

}
