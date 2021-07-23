@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/extraordinarios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/extraordinarios/.$p->$id./ver') }}"><i class="fas fa-eye"></i> VER</a>
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
							    	FORMULARIO DE SERVICIOS EXTRAORDINARIOS
							    	</strong>
							    </h6>
						  	</div>
						  	<div class="card-body">
						  		<div class="row">
					  				<div class="col-md-6">	
					  					<div class="row">
						  					<dt class="col-sm-4">Fecha del Servicio:</dt>
										  	<dd class="col-sm-8">{{\Carbon\Carbon::parse($p->fecha_ext)->format('d-m-Y')}}</dd>

										  	<dt class="col-sm-4">Hora del servicio:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->hora_ext}}</dd>

										  	<dt class="col-sm-4">Departamento:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{getDepartamentoArrayKey($p->departamento)}}</dd>

										  	<dt class="col-sm-4">Provincia:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{getProvinciaArrayKey($p->provincia)}}</dd>

										  	<dt class="col-sm-4">Municipio:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{getDepartamentoArrayKey($p->municipio)}}</dd>

										  	<dt class="col-sm-4">Localidad:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->localidad}}</dd>

										  	<dt class="col-sm-4">Zona o Barrio:</dt>
										  	<dd class="col-sm-8">{{$p->zona}}</dd>

										  	<dt class="col-sm-4">Lugar del Hecho (Avenida/Calle):</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->calle}}</dd>
									  	</div>
									</div>
									<div class="col-md-6">	
					  					<div class="row">
						  					
										  	<dt class="col-sm-4">GPS Coordenadas:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->coordenadas}}</dd>

										  	<dt class="col-sm-4">Unidades EPIs y otros:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->unidad}}</dd>

										  	<dt class="col-sm-4">Tipo de Servicio Extraordinario:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{getTipoKey($p->tipo)}}</dd>

										  	<dt class="col-sm-4">Número de Evanto y/o Actividad:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->evento}}</dd>

										  	<dt class="col-sm-4">Número de Grupos Desplegados:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{$p->desplegados}}</dd>

										  	<dt class="col-sm-4">Remitidos a:</dt>
										  	<dd class="col-sm-8 text-uppercase">{{getRemitidoExtraKey($p->remitido)}}</dd>
									  	</div>
									</div>
								</div>
						 	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection