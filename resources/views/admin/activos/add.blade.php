@extends('admin.maestro')
@section('title','Activos fijos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/5') }}"><i class="fas fa-boxes"></i> ACTIVOS FIJOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/5/add') }}"><i class="fas fa-plus"></i> AÑADIR</a>
	</li>
@endsection

@section('contenido')

	<div class="container-fluid">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-plus"></i></i> AÑADIR</h2>
			</div>
			<div class="inside">
				
				{!! Form::open(['url' => '/admin/activos/5/add', 'method' => 'POST', 'files' => true]) !!}

					<label for="datos-activo"><strong>REGISTRE LOS DATOS DEL ACTIVO FIJO:</strong></label>

						<div class="row">
							
							<div class="col-md-4">
								<label for="codigo">Código del Activo:</label>
									<div class="input-group">
					    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::text('codigo', null, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-3">
								<label for="fecha_ing">Fecha de Ingreso:</label>
									<div class="input-group">
					    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::date('fecha_ing', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
								</div>
							</div>

							<div class="col-md-3">
								<label for="fecha_alt">Fecha de Alta:</label>
									<div class="input-group">
					    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>

										{!! Form::date('fecha_alt', null, ['class' => 'form-control','disabled'])  !!}
								</div>
							</div>

						</div>

						<div class="row mtop16">
							
							<div class="col-md-3">
								<label for="estado">Estado del Activo:</label>
									<div class="input-group">
					    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::select('estado', getEstadoActivo(), 1,['class' => 'form-select'])  !!}
								</div>
							</div>

							<div class="col-md-4">
								<label for="nombre">Nombre del Activo:</label>
									<div class="input-group">
					    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

						</div>

						<div class="row mtop16">
								
							<div class="col-md-8">
								<label for="descripcion">Descripción del Activo Fijo:</label>
								{!! Form::textarea('descripcion', null, ['class' => 'form-control text-uppercase', 'rows' => '2']) !!}
							</div>

						</div>

						<div class="row mtop16">
							
							<div class="col-md-4">
								<label for="nombre_res">Nombre del Responsable:</label>
									<div class="input-group">
					    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::text('nombre_res', null, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-6">
									<label for="imagen_per">Ingrese una fotografia:</label>
									<div class="input-group mb-3">
										{!! Form::file('imagen_act', ['class' => 'form-control', 'id'=>'customFile', 'accept'=>'image/*']) !!}
									</div>
							</div>

						</div>

						<div class="row mtop16">
							
							<div class="col-md-4">
								<label for="procedencia">Procedencia:</label>
									<div class="input-group">
					    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::text('procedencia', null, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-6">
								<label for="documento_res">Documento de Respaldo:</label>
									<div class="input-group">
					    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::text('documento_res', null, ['class' => 'form-control text-uppercase']) !!}
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
