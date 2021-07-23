@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/bomberos') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('admin/casos/bomberos/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i> EDITAR FORMULARIO DE BOMBEROS</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/bomberos/'.$p->id.'/editar']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_suc">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_suc', $p->fecha_suc, ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_suc">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_suc', $p->hora_suc, ['class' => 'form-control text-uppercase']) !!}
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
					<label for="unidad">Unidad/Sub Estación:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('unidad', $p->unidad, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="zona">Zona o Barrio:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('zona', $p->zona, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

			</div>

			<div class="row mtop16">

				<div class="col-md-6">
					<label for="calle">Lugar del Hecho Calle y/o Avenida:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('calle', $p->calle, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

				<div class="col-md-4">
					<label for="coordenadas">GPS Coordenadas:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('coordenadas', $p->coordenadas, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>


 			</div>	

 			<div class="row mtop16">
 				
 				<div class="col-md-6">
					<label for="auxilios">Diferentes Auxilios:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('auxilios', getAuxiliosArray(), $p->auxilios, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-6">
					<label for="causa">Probable causa del hecho:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('causa', $p->causa, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>

 			</div>
 			
 			<div class="row mtop16">
 				
 				<div class="col-md-6">
					<label for="ocurrido">Hechos ocurridos en:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('ocurrido', getOcurridosArray(), $p->ocurrido, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="remitido_lugar">Victimas Remitidas a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_lugar', getRemitidoArray(), $p->remitido_lugar, ['class' => 'form-select']) !!}
						</div>
				</div>

 			</div>
	
			
			<div class="row mtop16">

				<div class="col-md-6">
					<label for="datos_victima">Datos de las victimas:</label>
					{!! Form::textarea('datos_victima', $p->datos_victima, ['class' => 'form-control text-uppercase', 'id' => '']) !!}
				</div>

				<div class="col-md-6">
					<label for="datos_arrestados">Datos de los arrestados:</label>
					{!! Form::textarea('datos_arrestados', $p->datos_arrestados, ['class' => 'form-control text-uppercase']) !!}
				</div>
		
			</div>

			<div class="row mtop16">
		
				<div class="col-md-5">
					<label for="remitido_epi">Caso Remitidos a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido_epi', getEpiArray(), $p->remitido_epi, ['class' => 'form-select']) !!}
						</div>
				</div>

				<div class="col-md-5">
					<label for="nombre_policia">Nombre Completo del Policia (Accion directa):</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre_policia', $p->nombre_policia, ['class' => 'form-control text-uppercase']) !!}
						</div>
				</div>
			
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