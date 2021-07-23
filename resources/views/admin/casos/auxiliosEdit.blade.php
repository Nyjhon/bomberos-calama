@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/auxilios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('admin/casos/auxilios/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>EDITAR FORMULARIO DE AUXILIOS</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/auxilios/'.$p->id.'/editar']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_aux">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_aux', $p->fecha_aux, ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_aux">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_aux', $p->hora_aux, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
					
				<div class="col-md-3">
					<label for="departamento">Departamento:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('departamento', getDepartamentoArray(), $p->departamento, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="provincia">Provincia:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('provincia', getProvinciaArray(), $p->provincia, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="municipio">Municipio:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('municipio', getDepartamentoArray(), $p->municipio, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="localidad">Localidad:</label>
						<div class="input-group">
		    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('localidad', $p->localidad, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

			</div>
 
 			<div class="row mtop16">

				<div class="col-md-3">
					<label for="zona">Zona o Barrio:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('zona', $p->zona, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

				<div class="col-md-6">
					<label for="calle">Lugar del Hecho Calle y/o Avenida:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('calle', $p->calle, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="coordenadas">GPS Coordenadas:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('coordenadas', $p->coordenadas, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

 				<div class="col-md-3">
					<label for="unidad">Unidad/Sub Estación:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('unidad', $p->unidad, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>
 			</div>

 			<hr>

 			<div class="row mtop16">
 				<div class="col-md-6">
 					<strong><label for="datos-auxiliados">DATOS DEL AUXILIADO</label></strong>
 				</div>
			</div>


 			<div class="row mtop16">

 				<div class="col-md-6">
 					<label for="nombre_apellido">Nombre y Apellido:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre_apellido', $p->nombre_apellido, ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>

 				<div class="col-md-3">
 					<label for="cedula">Cedula de Identidad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('cedula', $p->cedula, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>

 			<div class="row mtop16">
 				
 				<div class="col-md-3">
 					<label for="nacido_en">Nacido en:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nacido_en', $p->nacido_en, ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="nacionalidad">Nacionalidad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nacionalidad', $p->nacionalidad, ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="edad">Edad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('edad', $p->edad, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>

 			<div class="row mtop16">
 				
 				<div class="col-md-3">
					<label for="genero">Género:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('genero', getGeneroArray(), $p->genero, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="temperancia">Temperancia:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('temperancia', getTemperanciaArray(), $p->Temperancia, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="capacidad_dif">Capacidad diferente:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('capacidad_dif', getCapacidad(), $p->capacidad_dif, ['class' => 'form-select']) !!}
						</div>
				</div>
 			</div>

 			<hr>

 			<div class="row mtop16">
 				
 				<div class="col-md-6">
					<label for="auxilios">Diferentes Auxilios:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('auxilios', getAuxilios(), $p->auxilios, ['class' => 'form-select']) !!}
						</div>
				</div>

 			</div>
 			
 			<div class="row mtop16">

				<div class="col-md-4">
					<label for="remitido_lugar">Victimas Remitidas a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_lugar', getRemitido(), $p->remitido_lugar, ['class' => 'form-select']) !!}
						</div>
				</div>		

				<div class="col-md-4">
					<label for="nombre_policia">Nombre Completo del Policia (Accion directa):</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre_policia', $p->nombre_policia, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>
			
			</div>

			<div class="row mtop16">
			
			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
		</div>

	</div>
@endsection