@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/auxilios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/auxilios/.$p->$id./ver') }}"><i class="fas fa-eye"></i> VER</a>
	</li> 
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="page_personal">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-eye"></i><strong> Ver Caso</strong></h2>
				</div>
				<div class="inside">
					<div class="mini_profile">
						<div class="card">
						  	<div class="card-header">
							    <h6>
							    	<strong>
							    	FORMULARIO DE CASOS ATENDIDOS AUXILIOS
							    	</strong>
							    </h6>
						  	</div>
						  	<div class="card-body">
						  		<div class="row">
						  				<div class="col-md-6">	
									    	<dl class="row">
											  	<dt class="col-sm-4">Fecha del Caso:</dt>
											  	<dd class="col-sm-8">{{\Carbon\Carbon::parse($p->fecha_aux)->format('d-m-Y')}}</dd>

											  	<dt class="col-sm-4">Hora del Caso:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{$p->hora_aux}}</dd>

											  	<dt class="col-sm-4">Departamento:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{getDepartamentoArrayKey($p->departamento)}}</dd>

											  	<dt class="col-sm-4">Provincia:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{getProvinciaArrayKey($p->provincia)}}</dd>

											  	<dt class="col-sm-4">Municipio:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{getDepartamentoArrayKey($p->municipio)}}</dd>

											  	<dt class="col-sm-4">Localidad:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{$p->localidad}}</dd>

											  	<dt class="col-sm-4">Unidad/Subestación:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{$p->unidad}}</dd>

											  	<dt class="col-sm-4">Zona o Barrio:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{$p->zona}}</dd>

											  	<dt class="col-sm-4">Lugar del Hecho Calle y/o Avenida:</dt>
											  	<dd class="col-sm-8 text-uppercase">{{$p->calle}}</dd>

											  	<dt class="col-sm-4">GPS Coordenadas:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->coordenadas}}</dd>
											</dl>
										</div>
										<div class="col-md-6">	
									    	<dl class="row">
									    		
										  		<h6 class="mb16"><strong>Datos del Auxiliado:</strong></h6>

										  		<dt class="col-sm-4">Nombre y Apellido:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->nombre_apellido}}</dd>

										  		<dt class="col-sm-4">Número de C.I.:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->cedula}}</dd>

										  		<dt class="col-sm-4">Nacido en:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->nacido_en}}</dd>

										  		<dt class="col-sm-4">Nacionalidad:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->nacionalidad}}</dd>

										  		<dt class="col-sm-4">Edad:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->edad}}</dd>

										  		<dt class="col-sm-4">Género:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{getGeneroArrayKey($p->genero)}}</dd>

										  		<dt class="col-sm-4">Temperancia:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{getTemperanciaArrayKey($p->temperancia)}}</dd>

										  		<dt class="col-sm-4">Persona con Capacidad Diferente:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{getCapacidadKey($p->capacidad_dif)}}</dd>
											  	
											</dl>
										</div>
										<hr>
										<div class="col-md-6">
											<dl class="row">
												<dt class="col-sm-4">Diferentes Auxilios:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{getAuxiliosKey($p->auxilios)}}</dd>

										  		<dt class="col-sm-4">Remitidos A:</dt>
										  		<dd class="col-sm-8 text-uppercase">{{getRemitidoKey($p->remitido_lugar)}}</dd>

										  		<dt class="col-sm-4">Nombre Completo del policia (Acción Directa):</dt>
										  		<dd class="col-sm-8 text-uppercase">{{$p->nombre_policia}}</dd>
										  		
											</dl>
										</div>
								</div>
						 	 </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid mtop16">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-eye"></i><strong> Reporte de Caso de Relevancia</strong></h2>
			</div>
			<div class="inside">
				<h5><strong> Datos complementarios:</strong></h5>
				{!! Form::open([ 'url' => '/admin/casos/auxilios/'.$p->id.'/word', 'method' => 'POST']) !!}
					<div class="row g-3 mtop8">
					    <div class="col-md-2">
					    	{!! Form::number('numero', null ,['class' => 'form-control', 'placeholder' => 'NUMERO', 'aria-label' => 'dato1']) !!}
					    </div>
					    <div class="col">
					    	{!! Form::text('naturaleza', null ,['class' => 'form-control', 'placeholder' => 'NATURALEZA DEL HECHO', 'aria-label' => 'dato2']) !!}
					    </div>
					</div>
					<div class="row g-3 mtop8">
					    <div class="col">
					    	{!! Form::text('denunciante', null ,['class' => 'form-control' , 'placeholder' => 'DENUNCIANTE','aria-label' => 'dato2']) !!}
					    </div>
					</div>
					<div class="row g-3 mtop8">
					    <div class="col-md-4">
							{!! Form::textarea('victimas', null, ['class' => 'form-control', 'rows' => '3','placeholder' => 'VICTIMAS']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::textarea('fallecidas', null, ['class' => 'form-control' , 'rows' => '3','placeholder' => 'PERSONAS FALLECIDAS']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::textarea('heridas', null, ['class' => 'form-control' , 'rows' => '3','placeholder' => 'PERSONAS HERIDAS']) !!}
						</div>
					</div>
					<div class="row g-3 mtop8">
					    <div class="col-md-6">
							{!! Form::textarea('vehiculo', null, ['class' => 'form-control', 'rows' => '5','placeholder' => 'CODUCTORES DE VEHÍCULOS']) !!}
						</div>
						<div class="col-md-6">
							{!! Form::textarea('apoyo', null, ['class' => 'form-control', 'rows' => '5','placeholder' => 'APOYO BRIGRADA']) !!}
						</div>

					</div>
					
					<div class="row g-3 mtop8">
					    <div class="col-md-12">
							{!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '5','placeholder' => 'BREVE DETALLE DEL HECHO']) !!}
						</div>
					</div>
					<div class="row g-3 mtop8">
					    <div class="col-md-6">
					    	{!! Form::text('dañosp', null ,['class' => 'form-control' , 'placeholder' => 'DAÑOS PERSONALES','aria-label' => 'dato2']) !!}
					    </div>
					    <div class="col-md-6">
					    	{!! Form::text('dañosm', null ,['class' => 'form-control' , 'placeholder' => 'DAÑOS MATERIALES','aria-label' => 'dato2']) !!}
					    </div>
					</div>
					<div class="row g-3 mtop8">
					    <div class="col-md-12">
							{!! Form::textarea('causah', null, ['class' => 'form-control', 'rows' => '2','placeholder' => 'CAUSAS DEL HECHO']) !!}
						</div>
					</div>
					<div class="row mtop16">
						<div class="col-md-3">
							{!! Form::submit('Sacar Reporte', ['class' => 'btn btn-primary']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection