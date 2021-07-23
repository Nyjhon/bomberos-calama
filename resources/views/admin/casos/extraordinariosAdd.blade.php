@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/extraordinarios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/addExtraordinarios') }}"><i class="fas fa-plus"></i> AÑADIR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i> SERVICIO EXTRAORDINARIO</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/extraordinarios']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_ext">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_ext', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_ext">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_ext', null, ['class' => 'form-control text-uppercase']) !!}
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
							{!! Form::text('coordenadas', NULL, ['class' => 'form-control']) !!}
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
 					<label for="tipo">Tipo de Servicio Extraordinario:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('tipo', getTipo(), 25, ['class' => 'form-select']) !!}
						</div>
 				</div>

 				<div class="col-md-3">
 					<label for="evento">Num. de Evento y/o Actividad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('evento', null, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="desplegados">Num. de Grupos Desplegados:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('desplegados', null, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>
			<div class="row mtop16">
				<div class="col-md-4">
 					
 					<label for="remitido">Remitido A:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido', getRemitidoExtra(), 0, ['class' => 'form-select']) !!}
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