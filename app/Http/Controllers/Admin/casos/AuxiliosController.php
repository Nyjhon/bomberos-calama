<?php

namespace App\Http\Controllers\Admin\casos;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;

use App\Modelos\auxilio;
use App\Exports\auxilio_excel;
use App\Exports\auxilio_mes;
use PhpOffice\PhpWord\TemplateProcessor;


class AuxiliosController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');

    } 
    public function getAuxiliosHome(){
        $auxilio = auxilio::where('fecha_aux',\Carbon\Carbon::yesterday())->orderBy('id', 'desc')->paginate(25);
        $date = ['auxilios' => $auxilio];
    	return view('admin.casos.auxiliosHome', $date);
    }
    public function getAuxiliosAdd(){
    	return view('admin.casos.auxiliosAdd');
    }
    public function postAuxiliosAdd(Request $request){
        $auxilio = new auxilio();
        $rules = ['fecha_aux' => 'required',
                'hora_aux' => 'required',
                'localidad' => 'required',
                'zona' => 'required',
                'calle' => 'required',
                'coordenadas' => 'required',
                'nombre_apellido' => 'required',
                'nombre_policia' => 'required'
                ];
        $mensajes = [
            'fecha_aux.required' => 'La fecha es requerido',
            'hora_aux.required' => 'La hora es requerido',
            'localidad.required' => 'La localidad es requerido',
            'zona.required' => 'La zona o barrio es requerido',
            'calle.required' => 'La calle o avenida es requerido',
            'coordenadas.required' => 'Las coordenadas son requeridos',
            'nombre_apellido.required' => 'El nombre y apellido es requerido',
            'nombre_policia.required' => 'El nombre del policia es requerido'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $auxilio->fecha_aux = $request->input('fecha_aux');
            $auxilio->hora_aux = Str::upper($request->input('hora_aux'));
            $auxilio->departamento = Str::upper($request->input('departamento'));
            $auxilio->provincia = Str::upper($request->input('provincia'));    
            $auxilio->municipio = Str::upper($request->input('municipio')); 
            $auxilio->localidad = Str::upper($request->input('localidad'));
            $auxilio->zona = Str::upper($request->input('zona')); 
            $auxilio->calle = Str::upper($request->input('calle'));
            $auxilio->coordenadas = $request->input('coordenadas');
            $auxilio->unidad = Str::upper($request->input('unidad'));
            $auxilio->nombre_apellido = Str::upper($request->input('nombre_apellido'));
            $auxilio->cedula = $request->input('cedula');
            $auxilio->nacido_en = Str::upper($request->input('nacido_en'));      
            $auxilio->nacionalidad = Str::upper($request->input('nacionalidad'));
            $auxilio->edad = $request->input('edad');
            $auxilio->genero = Str::upper($request->input('genero'));
            $auxilio->temperancia = Str::upper($request->input('temperancia'));
            $auxilio->capacidad_dif = Str::upper($request->input('capacidad_dif'));
            $auxilio->auxilios = Str::upper($request->input('auxilios'));
            $auxilio->remitido_lugar = Str::upper($request->input('remitido_lugar'));
            $auxilio->nombre_policia = Str::upper($request->input('nombre_policia'));         
            if($auxilio->save()):
                return redirect('/admin/casos/auxilios')->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getAuxiliosEdit($id){
        $p = auxilio::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.auxiliosEdit', $data);

    }
    public function getAuxiliosEliminar($id){
        $p = auxilio::findOrfail($id);
        if ($p->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postAuxiliosEdit($id, Request $request){
        $auxilio = auxilio::findOrfail($id);

        $rules = ['fecha_aux' => 'required',
                'hora_aux' => 'required',
                'localidad' => 'required',
                'zona' => 'required',
                'calle' => 'required',
                'coordenadas' => 'required',
                'nombre_apellido' => 'required',
                'nombre_policia' => 'required'

                ];

        $mensajes = [
            'fecha_aux.required' => 'La fecha es requerido',
            'hora_aux.required' => 'La hora es requerido',
            'localidad.required' => 'La localidad es requerido',
            'zona.required' => 'La zona o barrio es requerido',
            'calle.required' => 'La calle o avenida es requerido',
            'coordenadas.required' => 'Las coordenadas son requeridos',
            'nombre_apellido.required' => 'El nombre y apellido es requerido',
            'nombre_policia.required' => 'El nombre del policia es requerido'

        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $auxilio->fecha_aux = $request->input('fecha_aux');
            $auxilio->hora_aux = Str::upper($request->input('hora_aux'));
            $auxilio->departamento = Str::upper($request->input('departamento'));
            $auxilio->provincia = Str::upper($request->input('provincia'));    
            $auxilio->municipio = Str::upper($request->input('municipio')); 
            $auxilio->localidad = Str::upper($request->input('localidad'));
            $auxilio->zona = Str::upper($request->input('zona')); 
            $auxilio->calle = Str::upper($request->input('calle'));
            $auxilio->coordenadas = $request->input('coordenadas');
            $auxilio->unidad = Str::upper($request->input('unidad'));
            $auxilio->nombre_apellido = Str::upper($request->input('nombre_apellido'));
            $auxilio->cedula = $request->input('cedula');
            $auxilio->nacido_en = Str::upper($request->input('nacido_en'));      
            $auxilio->nacionalidad = Str::upper($request->input('nacionalidad'));
            $auxilio->edad = $request->input('edad');
            $auxilio->genero = Str::upper($request->input('genero'));
            $auxilio->temperancia = Str::upper($request->input('temperancia'));
            $auxilio->capacidad_dif = Str::upper($request->input('capacidad_dif'));
            $auxilio->auxilios = Str::upper($request->input('auxilios'));
            $auxilio->remitido_lugar = Str::upper($request->input('remitido_lugar'));
            $auxilio->nombre_policia = Str::upper($request->input('nombre_policia'));        
            if($auxilio->save()):
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getAuxiliosVer($id){
        $p = auxilio::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.auxiliosVer', $data);
    }
    public function postAuxiliosBuscar(Request $request){
        $rules = [
            'buscar' => 'required'
        ];

        $mensajes = [
            'buscar.required' => 'Se necesita que ingrese el dato de busqueda'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/auxilios')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $fecha_aux = $request->get('buscar');
            $auxilio = auxilio::where('fecha_aux', $request->input('buscar'))->orderBy('id', 'desc')->paginate(25);
            $date = ['auxilios' => $auxilio];
        return view('admin.casos.auxiliosHome', $date);

        endif;
    }
    public function getDownloadWORD(Request $request, $id){
        $p = auxilio::findOrfail($id);
        $templateProcessor = new TemplateProcessor('exportar/caso-relevante-aux.docx');

        $templateProcessor->setValue('fecha_aux', Carbon::parse($p->fecha_aux)->format('d-m-Y'));
        $templateProcessor->setValue('hora_aux', $p->hora_aux);
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
    public function postAuxiliosExportar_fecha(Request $request){
        $rules = [
            'exportar' => 'required'
        ];

        $mensajes = [
            'exportar.required' => 'Se necesita que ingrese la fecha de exportar'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/auxilios')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new auxilio_excel)->fecha(request('exportar'))->download('auxilios '.Carbon::parse(request('exportar'))->format('d-m-Y').'.xlsx');
        endif;
    }
    public function postAuxiliosExportar_mes(Request $request){
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
            return redirect('/admin/casos/auxilios')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new auxilio_mes)->fecha(request('mes'),request('año'))->download('auxilios '.request('mes').'-'.request('año').'.xlsx');
        endif;
    }
}
