@extends('admin.maestro')
@section('title','Activos fijos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/5') }}"><i class="fas fa-boxes"></i> ACTIVOS FIJOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/'.$p->id.'/ver') }}"><i class="fas fa-eye"></i> VER</a>
	</li>
@endsection

@section('contenido')
	<div class="container-fluid">
		<div class="page_personal">
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-user-tie"></i><strong> Ver activo</strong></h2>
			<ul>
				<li>
					<a href="{{ url('/admin/activos/'.$p->id.'/word')}}"><i class="fas fa-file-download"></i> EXPORTAR</a>
				</li>
			</ul>
			
		</div>

		<div class="inside">
			<div class="mini_profile">
					<div class="card mb-3" style="max-width: 10000px;">
						<div class="card-header text-center text-white bg-dark text-uppercase">
								<h4>
						  	 	<strong>
							    	{{$p->codigo}} / {{$p->nombre}}
							    </strong>
							   	</h4>
						</div>
					  <div class="row g-0">
					    <div class="col-md-4">
					    	<div class="bloque-img ver">
					    		<div class="cuadrado-perfecto">
					    		<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_act)}}" data-fancybox="gallery">
					      			<img src = "{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_act)}}" class="img-thumbnail" >
					      		</a>
					      		</div>
					      	</div>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">
					        	<strong>
					        		DATOS DEL ACTIVO:
					        	</strong>
					    	</h5>
							
							<div class="row">
								<div class="col-md-6">
									<span class="title">Código del Activo:</span>
									<span class="text text-uppercase">{{$p->codigo}}</span>

									<span class="title">Estado:</span>
									<span class="text text-uppercase">{{getEstadoActivoKey($p->estado)}}</span>

									<span class="title">Procedencia:</span>
									<span class="text text-uppercase">{{$p->procedencia}}</span>

									<span class="title">Nombre del Responsable:</span>
									<span class="text text-uppercase">{{$p->nombre_res}}</span>

									<span class="title">Documento de Respaldo:</span>
									<span class="text text-uppercase">{{$p->documento_res}}</span>
									  							
								</div>
								<div class="col-md-6">
									<span class="title">Nombre del Activo:</span>
									<span class="text text-uppercase">{{$p->nombre}}</span>

									<span class="title">Fecha de Ingreso:</span>
									<span class="text text-uppercase">{{$p->fecha_ing}}</span>

									<span class="title">Fecha de Alta:</span>
									<span class="text text-uppercase">
										@if(is_null($p->fecha_alt))
											Activo en uso
										@else
											{{$p->fecha_alt}}
										@endif
									</span>

									<span class="title">Descripcíon:</span>
									<br>
									<span class="textarea">{!!$p->descripcion!!}</span>
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

	</div>

@endsection

