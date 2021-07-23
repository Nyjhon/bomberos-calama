<?php

namespace App\Http\Controllers\Admin\casos;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;

use App\Modelos\extraordinario;
use App\Exports\extraordinario_excel;
use App\Exports\extraordinario_mes;

class ExtraordinariosController extends Controller
{
	public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');
    } 
    public function getExtraordinariosHome(){
        $extraordinario = extraordinario::where('fecha_ext',\Carbon\Carbon::yesterday())->orderBy('id', 'desc')->paginate(25);
        $date = ['extraordinarios' => $extraordinario];
    	return view('admin.casos.extraordinariosHome', $date);
    }
    public function getExtraordinariosAdd(){
    	return view('admin.casos.extraordinariosAdd');
    }
    public function postExtraordinariosAdd(Request $request){
        
        $extraordinario = new extraordinario();

        $rules = [
                'fecha_ext' => 'required',
                'hora_ext' => 'required',
                'localidad' => 'required',
                'coordenadas' => 'required',
                'evento' => 'required',
                'desplegados' => 'required'
                 ];
        $mensajes = [
                'fecha_ext.required' => 'La Hecha es requerido',
                'hora_ext.required' => 'La Hora es requerido',
                'localidad.requerido' => 'La localidad es requerido',
                'coordenadas.required' => 'Las Coordenadas son requerido',
                'evento.required' => 'El Numero de Evento y/o Actividad es requerido',
                'desplegados.required' => 'El Num.de Grupos Desplegados es requerido'
                    ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $extraordinario->fecha_ext = $request->input('fecha_ext');
            $extraordinario->hora_ext = Str::upper($request->input('hora_ext'));
            $extraordinario->departamento = Str::upper($request->input('departamento'));
            $extraordinario->provincia = Str::upper($request->input('provincia'));
            $extraordinario->municipio = Str::upper($request->input('municipio'));
            $extraordinario->localidad = Str::upper($request->input('localidad'));
            $extraordinario->zona = Str::upper($request->input('zona'));
            $extraordinario->calle = Str::upper($request->input('calle'));
            $extraordinario->coordenadas = $request->input('coordenadas');
            $extraordinario->unidad = Str::upper($request->input('unidad'));
            $extraordinario->tipo = Str::upper($request->input('tipo'));
            $extraordinario->evento = Str::upper($request->input('evento'));
            $extraordinario->desplegados = $request->input('desplegados');
            $extraordinario->remitido = Str::upper($request->input('remitido'));



            if($extraordinario->save()):
                return redirect('/admin/casos/extraordinarios')->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;

        endif;    
    }
    public function getExtraordinariosEdit($id){
        $p = extraordinario::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.extraordinariosEdit', $data);
    }
    public function getExtraordinariosEliminar($id){
        $p = extraordinario::findOrfail($id);
        if ($p->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postExtraordinariosEdit($id, Request $request){
        $extraordinario = extraordinario::findOrfail($id);

        $rules = [
                'fecha_ext' => 'required',
                'hora_ext' => 'required',
                'localidad' => 'required',
                'coordenadas' => 'required',
                'evento' => 'required',
                'desplegados' => 'required'
                 ];
        $mensajes = [
                'fecha_ext.required' => 'La Hecha es requerido',
                'hora_ext.required' => 'La Hora es requerido',
                'localidad.requerido' => 'La localidad es requerido',
                'coordenadas.required' => 'Las Coordenadas son requerido',
                'evento.required' => 'El Numero de Evento y/o Actividad es requerido',
                'desplegados.required' => 'El Num.de Grupos Desplegados es requerido'
                    ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $extraordinario->fecha_ext = $request->input('fecha_ext');
            $extraordinario->hora_ext = Str::upper($request->input('hora_ext'));
            $extraordinario->departamento = Str::upper($request->input('departamento'));
            $extraordinario->provincia = Str::upper($request->input('provincia'));
            $extraordinario->municipio = Str::upper($request->input('municipio'));
            $extraordinario->localidad = Str::upper($request->input('localidad'));
            $extraordinario->zona = Str::upper($request->input('zona'));
            $extraordinario->calle = Str::upper($request->input('calle'));
            $extraordinario->coordenadas = $request->input('coordenadas');
            $extraordinario->unidad = Str::upper($request->input('unidad'));
            $extraordinario->tipo = Str::upper($request->input('tipo'));
            $extraordinario->evento = Str::upper($request->input('evento'));
            $extraordinario->desplegados = $request->input('desplegados');
            $extraordinario->remitido = Str::upper($request->input('remitido'));



            if($extraordinario->save()):
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
            endif;

        endif;  
    }
    public function postExtraordinariosBuscar(Request $request){
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
            $extraordinario = extraordinario::where('fecha_ext', $request->input('buscar'))->orderBy('id', 'desc')->paginate(25);
            $date = ['extraordinarios' => $extraordinario];
            return view('admin.casos.extraordinariosHome', $date);

        endif;
    }
    public function getExtraordinariosVer($id){
        $p = extraordinario::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.casos.extraordinariosVer', $data);
    }
    public function postExtraordinariosExportar_fecha(Request $request){
        $rules = [
            'exportar' => 'required'
        ];

        $mensajes = [
            'exportar.required' => 'Se necesita que ingrese la fecha de exportar'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('/admin/casos/extraordinarios')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new extraordinario_excel)->fecha(request('exportar'))->download('extraordinarios '.Carbon::parse(request('exportar'))->format('d-m-Y').'.xlsx');
        endif;
    }
    public function postExtraordinariosExportar_mes(Request $request){
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
            return redirect('/admin/casos/extraordinarios')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            return (new extraordinario_mes)->fecha(request('mes'),request('año'))->download('extraordinarios '.request('mes').'-'.request('año').'.xlsx');
        endif;
    }
}
