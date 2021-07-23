@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/bomberos') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/addBomberos') }}"><i class="fas fa-plus"></i> AÑADIR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i> FORMULARIO DE BOMBEROS</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/bomberos']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_suc">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_suc', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_suc">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_suc', null, ['class' => 'form-control text-uppercase']) !!}
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
					<label for="unidad">Unidad/Sub Estación:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('unidad', 'BOMBEROS', ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

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
 				
 				<div class="col-md-6">
					<label for="auxilios">Diferentes Auxilios:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('auxilios', getAuxiliosArray(), NULL, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-6">
					<label for="causa">Probable causa del hecho:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('causa', NULL, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

 			</div>
 			
 			<div class="row mtop16">
 				
 				<div class="col-md-6">
					<label for="ocurrido">Hechos ocurridos en:</label>
						<div class="input-group">
		    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('ocurrido', getOcurridosArray(), null, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="remitido_lugar">Victimas Remitidas a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_lugar', getRemitidoArray(), null, ['class' => 'form-select']) !!}
						</div>
				</div>

 			</div>
	
			
			<div class="row mtop16">

				<div class="col-md-6">
					<label for="datos_victima">Datos de las victimas:</label>
					{!! Form::textarea('datos_victima', null, ['class' => 'form-control text-uppercase']) !!}
				</div>

				<div class="col-md-6">
					<label for="datos_arrestados">Datos de los arrestados:</label>
					{!! Form::textarea('datos_arrestados', null, ['class' => 'form-control text-uppercase']) !!}
				</div>
			
			</div>

			<div class="row mtop16">

				<div class="col-md-5">
					<label for="remitido_epi">Caso Remitidos a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_epi', getEpiArray(), null, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-5">
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