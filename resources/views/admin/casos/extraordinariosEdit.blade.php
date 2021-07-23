@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/extraordinarios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('admin/casos/extraordinarios/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i> EDITAR SERVICIO EXTRAORDINARIO</h2>
		</div>
		<div class="inside">

			{!! Form::open(['url' => '/admin/casos/extraordinarios/'.$p->id.'/editar']) !!}

			<div class="row">

				<div class="col-md-3">
					<label for="fecha_ext">Fecha del Suceso:</label>
					<div class="input-group">
    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
					{!! Form::date('fecha_ext', $p->fecha_ext, ['class' => 'form-control'])  !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="hora_ext">Hora del Suceso:</label>
					<div class="input-group">
	    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
	    					</span>
						{!! Form::text('hora_ext', $p->hora_ext, ['class' => 'form-control text-uppercase']) !!}
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
							{!! Form::text('coordenadas', $p->coordenadas, ['class' => 'form-control']) !!}
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
 			</div>


 			<div class="row mtop16">
 				<div class="col-md-6">
 					<label for="tipo">Tipo de Servicio Extraordinario:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('tipo', getTipo(), $p->tipo, ['class' => 'form-select']) !!}
						</div>
 				</div>

 				<div class="col-md-3">
 					<label for="evento">Num. de Evento y/o Actividad:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('evento', $p->evento, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>
 				<div class="col-md-3">
 					<label for="desplegados">Num. de Grupos Desplegados:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::number('desplegados', $p->desplegados, ['class' => 'form-control', 'min' => '0']) !!}
						</div>
 				</div>

 			</div>
			<div class="row mtop16">
				<div class="col-md-4">
 					
 					<label for="remitido">Remitido A:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::select('remitido', getRemitidoExtra(), $p->remitido, ['class' => 'form-select']) !!}
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