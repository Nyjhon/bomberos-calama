<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Str, Config, Image;

use App\Modelos\vehiculo;
use App\Modelos\vehiculoverM;
use App\Modelos\vehiculoverD;
use App\Modelos\vehiculoverR;
use App\Modelos\vehiculoverO;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Exports\vehiculo_excel;
use Maatwebsite\Excel\Facades\Excel;

class VehiculosController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
        $this->middleware('user.permisos');

    }
    public function getVehiculos($estado){
        switch ($estado){
            case '1':
                $vehiculo = vehiculo::where('estado','1')->orderBy('id', 'desc')->paginate(25);
                break;
            case '2':
                $vehiculo = vehiculo::where('estado','2')->orderBy('id', 'desc')->paginate(25);
                break;
            case '3':
                $vehiculo = vehiculo::where('estado','3')->orderBy('id', 'desc')->paginate(25);
                break;
            case '4':
                $vehiculo = vehiculo::where('estado','4')->orderBy('id', 'desc')->paginate(25);
                break;
            case '5':
                $vehiculo = vehiculo::orderBy('id', 'desc')->paginate(25);
                break;
        }
        $date = ['vehiculos' => $vehiculo];
    	return view('admin.vehiculos.vehiculosHome', $date);
    }
    public function getVehiculosAdd(){
    	return view('admin.vehiculos.vehiculosAdd');
    }
    public function postVehiculosAdd(Request $request){
        $vehiculo = new vehiculo();
        $rules = [
            'sigla' => 'required|unique:vehiculos',
            'clase' => 'required', 'marca' => 'required',
            'tipo' => 'required', 'año_modelo' => 'required',
            'origen' => 'required','placa' => 'required|unique:vehiculos',
            'chasis' => 'required', 'n_motor' => 'required',
            'color' => 'required', 'n_ocupantes' => 'required',
            'estado' => 'required', 'imagen_veh' => 'required|image',
            'des_unidad' => 'required', 'fuente_adq' => 'required',
            'documento_res' => 'required'   ];
        $mensajes = [
            'sigla.required' => 'El sigla del vehículo es necesario',
            'sigla.unique' => 'El sigla ya se encuentra registrado',
            'clase.required' => 'El clase del vehículo es necesario',
            'marca.required' => 'La marca del vehículo es necesario',
            'tipo.required' => 'El tipo del vehículo es necesario',
            'año_modelo.required' => 'El año del modelo del vehículo es necesario',
            'origen.required' => 'El origen del vehículo es necesario',
            'placa.required' => 'La placa del vehículo es necesario',
            'placa.unique' => 'La placa ya se encuentra registrado',
            'chasis.required' => 'El Número de chasis del vehículo es necesario',
            'n_motor.required' => 'El Número de motor del vehículo es necesario',
            'color.required' => 'El color del vehículo es necesario',
            'n_ocupantes.required' => 'El Número de ocupantes del vehículo es necesario',
            'imagen_veh.required' => 'La Imagen del vehículo el necesario',
            'imagen_veh.image' => 'El archivo no es una imagen',
            'fuente_adq.required' => 'La fuente de adquisición del vehículo el necesario',
            'documento_res.required' => 'El documento de respaldo del vehículo el necesario' ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
             /* crea una carpeta con nombre de la fecha que se guardo la imagen */
            $path = '/'.date('Y-m-d');
            /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
            $fileExt = trim($request->file('imagen_veh')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $nombre = Str::slug(str_replace($fileExt,'', $request->file('imagen_veh')->getClientOriginalName()));
            $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;
            $vehiculo->imagen_veh = $nombre_imagen;
            $vehiculo->file_path = date('Y-m-d');
            $vehiculo->slug = Str::slug($request->input('marca'));
            $vehiculo->sigla = Str::upper($request->input('sigla'));
            $vehiculo->clase = Str::upper($request->input('clase'));
            $vehiculo->marca = Str::upper($request->input('marca'));
            $vehiculo->tipo = Str::upper($request->input('tipo'));
            $vehiculo->año_modelo =$request->input('año_modelo');
            $vehiculo->origen = Str::upper($request->input('origen'));
            $vehiculo->placa = Str::upper($request->input('placa'));
            $vehiculo->placa_gen = Str::upper($request->input('placa_gen'));
            $vehiculo->crpva = Str::upper($request->input('crpva'));
            $vehiculo->soat = $request->input('soat');
            $vehiculo->b_sisa = $request->input('b_sisa');
            $vehiculo->chasis = Str::upper($request->input('chasis'));
            $vehiculo->n_motor = Str::upper($request->input('n_motor'));
            $vehiculo->cilindrada = Str::upper($request->input('cilindrada'));
            $vehiculo->color = Str::upper($request->input('color'));
            $vehiculo->n_ocupantes = $request->input('n_ocupantes');
            $vehiculo->estado = Str::upper($request->input('estado'));
            $vehiculo->des_unidad = Str::upper($request->input('des_unidad'));
            $vehiculo->fuente_adq = Str::upper($request->input('fuente_adq'));
            $vehiculo->documento_res = Str::upper($request->input('documento_res'));
            if($vehiculo->save()):
                if($request->hasFile('imagen_veh')):
                    $fl = $request->imagen_veh->storeAs($path, $nombre_imagen, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                                $constraint->upsize();   });
                    $img->save($upload_path.'/'.$path.'/t_'.$nombre_imagen);
                endif;
                return redirect('/admin/vehiculos/5')->with('message', 'Guardado con éxito.')->with('typealert', 'success');    
            endif;
        endif;
    }
    public function getVehiculosEdit($id){
        $p = vehiculo::findOrfail($id);
        $data = ['p' => $p];

        return view('admin.vehiculos.vehiculosEdit', $data);
    }
    public function getVehiculosEliminar($id){
        $p = vehiculo::findOrfail($id);
        if($p->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postVehiculosEdit($id, Request $request){
        $vehiculo = vehiculo::findOrfail($id);

        $rules = [
            'clase' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'año_modelo' => 'required',
            'origen' => 'required',
            'chasis' => 'required',
            'n_motor' => 'required',
            'color' => 'required',
            'n_ocupantes' => 'required',
            'estado' => 'required',
            'des_unidad' => 'required',
            'fuente_adq' => 'required',
            'documento_res' => 'required'
            
        ];

        $mensajes = [
            'sigla.required' => 'El sigla del vehiculo es necesario',
            'clase.required' => 'El clase del vehiculo es necesario',
            'marca.required' => 'La marca del vehiculo es necesario',
            'tipo.required' => 'El tipo del vehiculo es necesario',
            'año_modelo.required' => 'El año del modelo del vehiculo es necesario',
            'origen.required' => 'El origen del vehiculo es necesario',
            'placa.required' => 'La placa del vehiculo es necesario',
            'chasis.required' => 'El Número de chasis del vehiculo es necesario',
            'n_motor.required' => 'El Número de motor del vehiculo es necesario',
            'color.required' => 'El color del vehiculo es necesario',
            'n_ocupantes.required' => 'El Número de ocupantes del vehiculo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $cambiar_img = $vehiculo->file_path;
            $cambiar = $vehiculo->imagen_veh;
            
            if ($request->hasFile('imagen_veh')):
                 /* crea una carpeta con nombre de la fecha que se guardo la imagen */
                $path = '/'.date('Y-m-d');
                /* trim elimina los espacion en el nombre de la imagen y con getCl... se obtiene la extencion*/
                $fileExt = trim($request->file('imagen_veh')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $nombre = Str::slug(str_replace($fileExt,'', $request->file('imagen_veh')->getClientOriginalName()));
                $nombre_imagen = rand(1,999).'-'.$nombre.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$nombre_imagen;

                $vehiculo->imagen_veh = $nombre_imagen;
                $vehiculo->file_path = date('Y-m-d');
            endif;
            $vehiculo->sigla = Str::upper($request->input('sigla'));
            $vehiculo->clase = Str::upper($request->input('clase'));
            $vehiculo->marca = Str::upper($request->input('marca'));
            $vehiculo->tipo = Str::upper($request->input('tipo'));
            $vehiculo->año_modelo =$request->input('año_modelo');
            $vehiculo->origen = Str::upper($request->input('origen'));
            $vehiculo->placa = Str::upper($request->input('placa'));
            $vehiculo->placa_gen = Str::upper($request->input('placa_gen'));
            $vehiculo->crpva = Str::upper($request->input('crpva'));
            $vehiculo->soat = $request->input('soat');
            $vehiculo->b_sisa = $request->input('b_sisa');
            $vehiculo->chasis = Str::upper($request->input('chasis'));
            $vehiculo->n_motor = Str::upper($request->input('n_motor'));
            $vehiculo->cilindrada = Str::upper($request->input('cilindrada'));
            $vehiculo->color = Str::upper($request->input('color'));
            $vehiculo->n_ocupantes = $request->input('n_ocupantes');
            $vehiculo->estado = Str::upper($request->input('estado'));
            $vehiculo->des_unidad = Str::upper($request->input('des_unidad'));
            $vehiculo->fuente_adq = Str::upper($request->input('fuente_adq'));
            $vehiculo->documento_res = Str::upper($request->input('documento_res'));

            if($vehiculo->save()):
                    if($request->hasFile('imagen_veh')):
                        $fl = $request->imagen_veh->storeAs($path, $nombre_imagen, 'uploads');
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
    public function getVehiculosVer($id){
        $p = vehiculo::findOrfail($id);
        $data = ['p' => $p];
        return view('admin.vehiculos.vehiculosVer', $data);
    }
    
    public function postVehiculosBuscar(Request $request){
        $rules = [
            'buscar' => 'required'
        ];

        $mensajes = [
            'buscar.required' => 'Se necesita que ingrese el dato de busqueda'
        ];

        $validator = Validator::make($request->all(), $rules, $mensajes);

        if($validator->fails()):
            return redirect('admin/vehiculos/5')->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $placa = Str::upper($request->get('buscar'));
            $vehiculos = vehiculo::where('placa' ,$placa)->orderBy('id', 'desc')->paginate(25);
            $data = ['vehiculos' => $vehiculos];
            return view('admin.vehiculos.vehiculosHome', $data);
        endif;
    }
    public function postVehiculosVerMantenimiento(Request $request, $sigla){
        $rules = [
            'fecha' => 'required',
            'pieza' => 'required',
            'detalle' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'pieza.required' => 'Se necesita que ingrese la pieza.',
            'detalle.required' => 'Se necesita que ingrese el detalle.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $vehiculoverM = new vehiculoverM();

            $vehiculoverM->sigla = $sigla;
            $vehiculoverM->fecha = $request->input('fecha');
            $vehiculoverM->pieza = Str::upper($request->input('pieza'));
            $vehiculoverM->detalle = Str::upper($request->input('detalle'));
            $vehiculoverM->nombre = Str::upper($request->input('nombre'));
            $vehiculoverM->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverM->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getVehiculosVerMEliminar($id){
        $m = vehiculoverM::findOrfail($id);
        if($m->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postVehiculosVerMEdit(Request $request, $sigla, $id){
        $vehiculoverM = vehiculoverM::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'pieza' => 'required',
            'detalle' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'pieza.required' => 'Se necesita que ingrese la pieza.',
            'detalle.required' => 'Se necesita que ingrese el detalle.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $vehiculoverM->sigla = $sigla;
            $vehiculoverM->fecha = $request->input('fecha');
            $vehiculoverM->pieza = Str::upper($request->input('pieza'));
            $vehiculoverM->detalle = Str::upper($request->input('detalle'));
            $vehiculoverM->nombre = Str::upper($request->input('nombre'));
            $vehiculoverM->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverM->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;

    }
    public function postVehiculosVerDocumentos(Request $request, $sigla){
        $rules = [
            'fecha' => 'required',
            'pieza' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'pieza.required' => 'Se necesita que ingrese la pieza.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $vehiculoverD = new vehiculoverD();

            $vehiculoverD->sigla = $sigla;
            $vehiculoverD->fecha = $request->input('fecha');
            $vehiculoverD->pieza = Str::upper($request->input('pieza'));
            $vehiculoverD->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverD->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getVehiculosVerDEliminar($id){
        $d = vehiculoverD::findOrfail($id);
        if($d->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postVehiculosVerDEdit(Request $request, $sigla, $id){
        $vehiculoverD = vehiculoverD::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'pieza' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'pieza.required' => 'Se necesita que ingrese la pieza.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $vehiculoverD->sigla = $sigla;
            $vehiculoverD->fecha = $request->input('fecha');
            $vehiculoverD->pieza = Str::upper($request->input('pieza'));
            $vehiculoverD->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverD->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;

    }
    public function postVehiculosVerRequerimiento(Request $request, $sigla){
        $rules = [
            'fecha' => 'required',
            'requerimiento' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'requerimiento.required' => 'Se necesita que ingrese el requerimiento.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $vehiculoverR = new vehiculoverR();

            $vehiculoverR->sigla = $sigla;
            $vehiculoverR->fecha = $request->input('fecha');
            $vehiculoverR->requerimiento = Str::upper($request->input('requerimiento'));
            $vehiculoverR->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverR->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getVehiculosVerREliminar($id){
        $r = vehiculoverR::findOrfail($id);
        if($r->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postVehiculosVerREdit(Request $request, $sigla, $id){
        $vehiculoverR = vehiculoverR::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'requerimiento' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'requerimiento.required' => 'Se necesita que ingrese el requerimiento.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $vehiculoverR->sigla = $sigla;
            $vehiculoverR->fecha = $request->input('fecha');
            $vehiculoverR->requerimiento = Str::upper($request->input('requerimiento'));
            $vehiculoverR->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverR->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }

    public function postVehiculosVerOtros(Request $request, $sigla){
        $rules = [
            'fecha' => 'required',
            'tipo' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'tipo.required' => 'Se necesita que ingrese el tipo de mantenimiento.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $vehiculoverO = new vehiculoverO();

            $vehiculoverO->sigla = $sigla;
            $vehiculoverO->fecha = $request->input('fecha');
            $vehiculoverO->tipo = Str::upper($request->input('tipo'));
            $vehiculoverO->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverO->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getVehiculosVerOEliminar($id){
        $r = vehiculoverO::findOrfail($id);
        if($r->delete()):
            return back()->with('message','Eliminado con Exito.')->with('typealert','danger');
        endif;
    }
    public function postVehiculosVerOEdit(Request $request, $sigla, $id){
        $vehiculoverO = vehiculoverO::findOrfail($id);
        $rules = [
            'fecha' => 'required',
            'tipo' => 'required',
            'observacion' => 'required'
        ];

        $mensajes = [
            'fecha.required' => 'Se necesita que ingrese la fecha.',
            'tipo.required' => 'Se necesita que ingrese el tipo de mantenimiento.',
            'observacion.required' => 'Se necesita que ingrese el observacion.'
        ];
        $validator = Validator::make($request->all(), $rules, $mensajes);
        if($validator->fails()):
            return back()->withErrors($validator) -> with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:

            $vehiculoverO->sigla = $sigla;
            $vehiculoverO->fecha = $request->input('fecha');
            $vehiculoverO->tipo = Str::upper($request->input('tipo'));
            $vehiculoverO->observacion = Str::upper($request->input('observacion'));
            if($vehiculoverO->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getDownloadWORD($id, $sigla){
        $p = vehiculo::findOrfail($id);
        $templateProcessor = new TemplateProcessor('exportar/vehiculo.docx');

        $templateProcessor->setValue('sigla', $p->sigla);
        $templateProcessor->setValue('placa', $p->placa);
        $templateProcessor->setValue('estado', getEstadoActivoKey($p->estado));
        $templateProcessor->setValue('clase', $p->clase);
        $templateProcessor->setValue('marca', $p->marca);
        $templateProcessor->setValue('tipo', $p->tipo);
        $templateProcessor->setValue('color', $p->color);
        $templateProcessor->setValue('año_modelo', $p->año_modelo);
        $templateProcessor->setValue('origen', $p->origen);
        $templateProcessor->setValue('placa_gen', $p->placa_gen);
        $templateProcessor->setValue('estado', $p->estado);
        $templateProcessor->setValue('crpva', $p->crpva);
        $templateProcessor->setValue('n_ocupantes', $p->n_ocupantes);
        $templateProcessor->setValue('soat', $p->soat);
        $templateProcessor->setValue('b_sisa', $p->b_sisa);
        $templateProcessor->setValue('chasis', $p->chasis);
        $templateProcessor->setValue('n_motor', $p->n_motor);
        $templateProcessor->setValue('cilindrada', $p->cilindrada);
        $templateProcessor->setValue('des_unidad', $p->des_unidad);
        $templateProcessor->setValue('fuente_adq', $p->fuente_adq);
        $templateProcessor->setValue('documento_res', $p->documento_res);
       

        $vehiculoverM = vehiculoverM::where('sigla',$p->sigla)->count();
        if ($vehiculoverM == 0):
            $templateProcessor->setValue('fecham', '');
            $templateProcessor->setValue('piezam', '');
            $templateProcessor->setValue('detallem', '');
            $templateProcessor->setValue('nombrem', '');
            $templateProcessor->setValue('observacionm', '');

        else:
            foreach($p->getmantenimiento as $m){
            $valuesm[] =['fecham' => $m->fecha, 'piezam' => $m->pieza, 'detallem' => $m->detalle, 'nombrem' => $m->nombre, 'observacionm' => $m->observacion];
            }
            $templateProcessor->cloneRowAndSetValues('fecham', $valuesm);
        endif;


        $vehiculoverD = vehiculoverD::where('sigla',$p->sigla)->count();
        if ($vehiculoverD == 0):
            $templateProcessor->setValue('fechad', '');
            $templateProcessor->setValue('piezad', '');
            $templateProcessor->setValue('detalled', '');
            $templateProcessor->setValue('observaciond', '');

        else:
            foreach($p->getdocumentos as $d){
            $valuesd[] =['fechad' => $d->fecha, 'piezad' => $d->pieza,'detalled' => $d->detalle,'observaciond' => $d->observacion];
            }
            $templateProcessor->cloneRowAndSetValues('fechad', $valuesd);
        endif;
        
        $vehiculoverR = vehiculoverR::where('sigla',$p->sigla)->count();
        if ($vehiculoverR == 0):
            $templateProcessor->setValue('fechar', '');
            $templateProcessor->setValue('requerimientor', '');
            $templateProcessor->setValue('observacionr', '');

        else:
            foreach($p->getrequerimiento as $r){
            $valuesr[] =['fechar' => $r->fecha, 'requerimientor' => $r->requerimiento,'observacionr' => $r->observacion];
            }
            $templateProcessor->cloneRowAndSetValues('fechar', $valuesr);
        endif;
        


        $templateProcessor->setImageValue('imagen_veh', array('path' => public_path('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_veh), 'width' => 450, 'height' => 400, 'ratio' => false));
        
        $fileName = $p->sigla;
        $templateProcessor->saveAs($fileName. '.docx');
        return response()->download($fileName. '.docx')->deleteFileAfterSend(true);
    }
    public function getDownloadEXCEL($estado){
        return Excel::download(new vehiculo_excel, 'vehiculos.xlsx');
    }
}
