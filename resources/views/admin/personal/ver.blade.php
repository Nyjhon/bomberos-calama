@extends('admin.maestro')
@section('title','Personal')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/4') }}"><i class="fas fa-user-tie"></i> PERSONAL</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/'.$p->id.'/ver') }}"><i class="fas fa-eye"></i> VER</a>
	</li>
@endsection

@section('contenido')
	<div class="container-fluid">
		<div class="page_personal">
		<div class="panel shadow">
		<div class="header">
			
				<h2 class="title"><i class="fas fa-eye"></i><strong> Ver Personal</strong></h2>
				<ul>
				<li>
					<a href="{{ url('/admin/personal/'.$p->id.'/word')}}"><i class="fas fa-file-download"></i> EXPORTAR</a>
				</li>
			</ul>
			
		</div>

		<div class="inside">
			<div class="mini_profile">
					<div class="card mb-3" style="max-width: 10000px;">
						<div class="card-header text-center text-white bg-dark">
								<h4>
						  	 	<strong class="text-uppercase">
							    	{{$p->apellido_pat}} {{$p->apellido_mat}} {{$p->nombres}} 
							    </strong>
							   	</h4>
						</div>
					  <div class="row g-0">
					    <div class="col-md-4">
					    	<div class="bloque-img ver">
					    		<div class="cuadrado-perfecto">
					    			<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_per)}}" data-fancybox="gallery">
					      				<img src = "{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_per)}}" class="img-thumbnail">
					      			</a>
					      		</div>
					      	</div>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">
					        	<strong>
					        		DATOS DEL PERSONAL:
					        	</strong>
					        </h5>
							
							<div class="row">
								<div class="col-md-6">
									<span class="title">Nombre Completo:</span>
									<span class="text text-uppercase">{{$p->apellido_pat}} {{$p->apellido_mat}} {{$p->nombres}}</span>

									<span class="title">Cédula de Identidad:</span>
									<span class="text">{{$p->ci}}</span>

									<span class="title">Celular:</span>
									<span class="text">{{$p->celular}}</span>

									<span class="title">Grado:</span>
									<span class="text text-uppercase">{{$p->grado}}</span>

									<span class="title">Unidad de Destino:</span>
									<span class="text text-uppercase">{{$p->unidad_des}}</span>

									<span class="title">Cargo Actual:</span>
									<span class="text text-uppercase">{{$p->cargo_act}}</span>

									<span class="title">Número de Escalafón:</span>
									<span class="text text-uppercase">{{$p->numero_esc}}</span>

									<span class="title">Antiguedad de Grado:</span>
									<span class="text text-uppercase">{{$p->antiguedad_grado}}</span>

									<span class="title">Ubicación:</span>
									<span class="text text-uppercase">{{$p->ubicacion}}</span>

	  							
								</div>
								<div class="col-md-6">
									<span class="title">Fecha de Nacimiento:</span>
									<span class="text">{{$p->fecha_nac}}</span>

									<span class="title">Expedido:</span>
									<span class="text text-uppercase">{{getDepartamentoArrayKey($p->exp)}}</span>

									<span class="title">Género:</span>
									<span class="text text-uppercase">{{getGeneroArrayKey($p->genero)}}</span>

									<span class="title">Número de Licencia:</span>
									<span class="text">{{$p->licencia}}</span>

									<span class="title">Categoría de Licencia:</span>
									<span class="text">{{$p->categoria}}</span>

									<span class="title">Número de Seguro:</span>
									<span class="text">{{$p->seguro}}</span>

									<span class="title">Fecha de Destino:</span>
									<span class="text">{{$p->fecha_des}}</span>

									<span class="title">Fecha de Alta:</span>
									<span class="text">{{$p->fecha_alt}}</span>

									<span class="title">Destino Anterior:</span>
									<span class="text text-uppercase">{{$p->destino_ant}}</span>

									<span class="title">Referencia:</span>
									<span class="text text-uppercase">{{$p->referencia}}</span>
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
	<div class="container-fluid mtop16">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-user-tie"></i></i><strong> Historial del Personal</strong></h2>
			</div>
			<div class="inside">
				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingOne">
						    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						        <h5><i class="far fa-list-alt"></i>  CURSOS REALIZADOS</h5>
						    </button>
					    </h2>
					    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					      	<div class="accordion-body">
					      		@include('admin.personal.historial.cursos')	
					    	</div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingTwo">
						    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
						        <h5><i class="far fa-list-alt"></i>  EXPERIENCIA DE TRABAJO</h5>
						    </button>
					    </h2>
					    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
					      	<div class="accordion-body">
					      		@include('admin.personal.historial.experiencia')
					    	</div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingThree">
					        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
					        	<h5><i class="far fa-list-alt"></i>  RECONOCIMIENTOS</h5>
					        </button>
					    </h2>
					    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
					      	<div class="accordion-body">
					      		@include('admin.personal.historial.reconocimientos')	
					    	</div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingFor">
					        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFor" aria-expanded="false" aria-controls="flush-collapseFor">
					        	<h5><i class="far fa-list-alt"></i>  ANTECEDENTES</h5>
					        </button>
					    </h2>
					    <div id="flush-collapseFor" class="accordion-collapse collapse" aria-labelledby="flush-headingFor" data-bs-parent="#accordionFlushExample">
					        <div class="accordion-body">
					      		@include('admin.personal.historial.antecedentes')
					    	</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>

@endsection

