@extends('admin.maestro')
@section('title','Activos fijos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/5') }}"><i class="fas fa-boxes"></i> ACTIVOS FIJOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection

@section('contenido')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-edit"></i><strong> Editar Activo</strong></h2>
					</div>
					<div class="inside">
						
						{!! Form::open(['url' => '/admin/activos/'.$p->codigo.'/editar/'.$p->id, 'method' => 'POST', 'files' => true]) !!}

							<label for="datos-activo"><strong>DATOS DEL ACTIVO FIJO:</strong></label>

								<div class="row">
									
									<div class="col-md-4">
										<label for="codigo">Codigo:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::text('codigo', $p->codigo, ['class' => 'form-control text-uppercase', 'disabled']) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="fecha_ing">Fecha de Ingreso:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::date('fecha_ing',$p->fecha_ing, ['class' => 'form-control'])  !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="fecha_alt">Fecha de Alta:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
							    				@if( $p->estado == 4)
							    					{!! Form::date('fecha_alt', $p->fecha_alt, ['class' => 'form-control'])  !!}
							    				@else
							    					{!! Form::date('fecha_alt', $p->fecha_alt, ['class' => 'form-control','disabled'])  !!}
							    				@endif
												
										</div>
									</div>

								</div>

								<div class="row mtop16">
									
									<div class="col-md-3">
										<label for="estado">Estado del Activo:</label>
											<div class="input-group">
							    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::select('estado', getEstadoActivo(), $p->estado,['class' => 'form-select text-uppercase'])  !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="nombre">Nombre del Activo:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::text('nombre', $p->nombre, ['class' => 'form-control text-uppercase']) !!}
										</div>
									</div>

								</div>

								<div class="row mtop16">
										
									<div class="col-md-12">
										<label for="descripcion">Descripción del Activo Fijo:</label>
										{!! Form::textarea('descripcion', $p->descripcion, ['class' => 'form-control text-uppercase']) !!}
									</div>

								</div>

								<div class="row mtop16">
									
									<div class="col-md-6">
										<label for="nombre_res">Nombre del Responsable:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::text('nombre_res', $p->nombre_res, ['class' => 'form-control text-uppercase']) !!}
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
									
									<div class="col-md-6">
										<label for="procedencia">Procedencia:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::text('procedencia', $p->procedencia, ['class' => 'form-control text-uppercase']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<label for="documento_res">Documento de Respaldo:</label>
											<div class="input-group">
							    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    					</span>
												{!! Form::text('documento_res', $p->documento_res, ['class' => 'form-control text-uppercase']) !!}
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
			<div class="col-md-3">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-edit"></i> Imagen del Activo</h2>
					</div>
					<div class="inside">
						<div class="bloque-img">
							<div class="cuadrado-perfecto">
								<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_act)}}" data-fancybox="gallery">
								<img src="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_act)}}" class="img-thumbnail">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

@endsection