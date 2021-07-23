@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/auxilios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/addAuxilios') }}"><i class="fas fa-plus"></i> AÑADIR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i> FORMULARIO DE AUXILIOS</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/auxilios']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_aux">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_aux', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_aux">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_aux', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
					
				<div class="col-md-3">
					<label for="departamento">Departamento:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('departamento', getDepartamentoArray(), 1, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="provincia">Provincia:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('provincia', getProvinciaArray(), 25, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="municipio">Municipio:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('municipio', getDepartamentoArray(), 1, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="localidad">Localidad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('localidad', null, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

			</div>
 
 			<div class="row mtop16">

				<div class="col-md-3">
					<label for="zona">Zona o Barrio:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('zona', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

			</div>

			<div class="row mtop16">

				<div class="col-md-6">
					<label for="calle">Lugar del Hecho Calle y/o Avenida:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('calle', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

				<div class="col-md-4">
					<label for="coordenadas">GPS Coordenadas:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('coordenadas', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>


 			</div>	

 			<div class="row mtop16">
 				<div class="col-md-3">
					<label for="unidad">Unidad/Sub Estación:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('unidad', 'BOMBEROS', ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>
 			</div>


 			<div class="row mtop16">
 				<div class="col-md-6">
 					<label for="datos-auxiliados">DATOS DEL AUXILIADO</label>
 				</div>
			</div>


 			<div class="row mtop16">

 				<div class="col-md-6">
 					<label for="nombre_apellido">Nombre y Apellido:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre_apellido', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>

 				<div class="col-md-3">
 					<label for="cedula">Cedula de Identidad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('cedula', null, ['class' => 'form-control text-uppercase', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>

 			<div class="row mtop16">
 				
 				<div class="col-md-3">
 					<label for="nacido_en">Nacido en:</label>
						<div class="input-group">
		    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nacido_en', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="nacionalidad">Nacionalidad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nacionalidad', 'BOLIVIANO', ['class' => 'form-control text-uppercase']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="edad">Edad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('edad', null, ['class' => 'form-control text-uppercase', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>

 			<div class="row mtop16">
 				
 				<div class="col-md-3">
					<label for="genero">Genero:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('genero', getGeneroArray(), 0, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="temperancia">Temperancia:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('temperancia', getTemperanciaArray(), 0, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="capacidad_dif">Capacidad diferente:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('capacidad_dif', getCapacidad(), 0, ['class' => 'form-select']) !!}
						</div>
				</div>
 			</div>

 			<div class="row mtop16">
 				
 				<div class="col-md-6">
					<label for="auxilios">Diferentes Auxilios:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('auxilios', getAuxilios(), NULL, ['class' => 'form-select']) !!}
						</div>
				</div>

 			</div>
 			
 			<div class="row mtop16">
 				
 				<div class="col-md-4">
					<label for="remitido_lugar">Victimas Remitidas a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_lugar', getRemitido(), NULL, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-4">
					<label for="nombre_policia">Nombre Completo del Policia (Accion directa):</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre_policia', null, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

 			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
		</div>

	</div>
@endsection