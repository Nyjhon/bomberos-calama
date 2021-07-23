@extends('admin.maestro')
@section('title','Parqueo Automotor')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/5') }}"><i class="fas fa-truck-pickup"></i> PARQUEO AUTOMOTOR</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/'.$p->id.'/ver') }}"><i class="fas fa-eye"></i> VER</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="page_personal">
		<div class="panel shadow">
		<div class="header">
			
			<h2 class="title"><i class="fas fa-eye"></i><strong> Ver Vehículo</strong></h2>
			<ul>
				<li>
					<a href="{{ url('/admin/vehiculos/'.$p->id.'/word/'.$p->sigla)}}"><i class="fas fa-file-download"></i> EXPORTAR</a>
				</li>
			</ul>
		</div>

		<div class="inside">
			<div class="mini_profile">
					<div class="card mb-3" style="max-width: 10000px;">
						<div class="card-header text-center text-white bg-dark">
								<h4 class="text-uppercase">
						  	 	<strong>
							    	{{$p->sigla}}  /  {{$p->marca}} 
							    </strong>
							   	</h4>
						</div>
					  <div class="row g-0">
					    <div class="col-md-4">
					    	<div class="bloque-img ver">
					    		<div class="cuadrado-perfecto">
					    			<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_veh)}}" data-fancybox="gallery">
					      				<img src = "{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_veh)}}" class="img-thumbnail">
					      			</a>
					      		</div>
					      	</div>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">
					        	<strong>
					        		DATOS DEL VEHÍCULO:
					        	</strong>
					        </h5>
							
							<div class="row">
								<div class="col-md-4">
									<span class="title">Sigla:</span>
									<span class="text text-uppercase">{{$p->sigla}}</span>

									<span class="title">Clase:</span>
									<span class="text text-uppercase">{{$p->clase}}</span>

									<span class="title">Año del Modelo:</span>
									<span class="text text-uppercase">{{$p->año_modelo}}</span>

									<span class="title">Placa:</span>
									<span class="text text-uppercase">{{$p->placa}}</span>

									<span class="title">CRPVA:</span>
									<span class="text text-uppercase">{{$p->crpva}}</span>

									<span class="title">N° de B-sisa:</span>
									<span class="text text-uppercase">{{$p->b_sisa}}</span>

									<span class="title">N° de Motor:</span>
									<span class="text text-uppercase">{{$p->n_motor}}</span>

								</div>
								<div class="col-md-4">
									<span class="title">Marca:</span>
									<span class="text text-uppercase">{{$p->marca}}</span>

									<span class="title">Tipo:</span>
									<span class="text text-uppercase">{{$p->tipo}}</span>

									<span class="title">Origen:</span>
									<span class="text text-uppercase">{{$p->origen}}</span>

									<span class="title">Placa Generada:</span>
									<span class="text text-uppercase">{{$p->placa_gen}}</span>

									<span class="title">N° Roseta soat:</span>
									<span class="text text-uppercase">{{$p->soat}}</span>

									<span class="title">N° de Chasis:</span>
									<span class="text text-uppercase">{{$p->chasis}}</span>

									<span class="title">Cilindrada:</span>
									<span class="text text-uppercase">{{$p->cilindrada}}</span>
								</div>
								<div class="col-md-4">
									<span class="title">Color:</span>
									<span class="text text-uppercase">{{$p->color}}</span>

									<span class="title">N° Ocupantes:</span>
									<span class="text">{{$p->n_ocupantes}}</span>

									<span class="title">Estado Actual:</span>
									<span class="text text-uppercase">{{getEstadoVehiculokey($p->estado)}}</span>

									<span class="title">Destino Unidad:</span>
									<span class="text text-uppercase">{{$p->des_unidad}}</span>

									<span class="title">Fuente de Adquisición:</span>
									<span class="text text-uppercase">{{$p->fuente_adq}}</span>

									<span class="title">Documento de respaldo:</span>
									<span class="text text-uppercase">{{$p->documento_res}}</span>
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
				<h2 class="title"><i class="fas fa-tools"></i><strong> Documentos y/o Mantenimientos</strong></h2>
			</div>

			<div class="inside">

				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingOne">
						    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						        <h5><i class="far fa-list-alt"></i> HOJA DE MANTENIMIENTO</h5>
						    </button>
					    </h2>
					    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					      	<div class="accordion-body">
					      		@include('admin.vehiculos.detalle.vehiculoverM')
					    	</div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingTwo">
					        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
					        <h5><i class="far fa-list-alt"></i> DOCUMENTOS DEL VEHÍCULOS</h5>
					        </button>
					    </h2>
					    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
					      	<div class="accordion-body">
					      		@include('admin.vehiculos.detalle.vehiculoverD')
					    	</div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingThree">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
					        <h5><i class="far fa-list-alt"></i> REQUERIMIENTOS DEL VEHÍCULO</h5>
					      </button>
					    </h2>
					    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
					        <div class="accordion-body">
					      		@include('admin.vehiculos.detalle.vehiculoverR')
					    	</div>
						</div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingFour">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
					        <h5><i class="far fa-list-alt"></i> OTROS MANTENIMIENTOS DEL VEHÍCULO</h5>
					      </button>
					    </h2>
					    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
					        <div class="accordion-body">
					      		@include('admin.vehiculos.detalle.vehiculoverO')
					    	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
