@extends('admin.maestro')
@section('title','Parqueo Automotor')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/5') }}"><i class="fas fa-truck-pickup"></i> PARQUEO AUTOMOTOR</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection
@section('contenido')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-edit"></i><strong> Editar Vehículo</strong></h2>
					</div>
					<div class="inside">
						
						{!! Form::open(['url' => '/admin/vehiculos/'.$p->id.'/editar', 'method' => 'POST', 'files' => true]) !!}

						<div class="row">
							
							<div class="col-md-3">
								<label for="sigla">Sigla:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('sigla', $p->sigla, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="clase">Clase:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('clase', $p->clase, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-3">
								<label for="marca">Marca:</label>
									<div class="input-group">									    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('marca', $p->marca, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							
						</div>

						<div class="row mtop16">

							<div class="col-md-3">
								<label for="tipo">Tipo:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('tipo', $p->tipo, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-3">
								<label for="año_modelo">Año del Modelo:</label>
								<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::number('año_modelo', $p->año_modelo, ['class' => 'form-control', 'min' => '0'] ) !!}
								</div>
							</div>

							<div class="col-md-3">
								<label for="origen">Origen:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('origen', $p->origen, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

						</div>

						<div class="row mtop16">
							<div class="col-md-3">
								<label for="placa">Placa:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('placa', $p->placa, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-3">
								<label for="placa_gen">Placa Generada DNFR:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('placa_gen',$p->placa_gen, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-3">
								<label for="crpva">N° CRPVA:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('crpva', $p->crpva, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-3">
								<label for="soat">N° Roseta Soat:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::number('soat', $p->soat, ['class' => 'form-control', 'min' => '0'] ) !!}
									</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-4">
								<label for="b_sisa">N° de B-SISA:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::number('b_sisa', $p->b_sisa, ['class' => 'form-control', 'min' => '0'] ) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="chasis">N° de Chasis:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('chasis', $p->chasis, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-3">
								<label for="n_motor">N° de Motor:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('n_motor', $p->n_motor, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="cilindrada">Cilindrada:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('cilindrada', $p->cilindrada, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="color">Color:</label>
									<div class="input-group">
									   <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('color', $p->color, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

						</div>

						<div class="row mtop16">

							<div class="col-md-4">
								<label for="n_ocupantes">N° de Ocupantes:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::number('n_ocupantes', $p->n_ocupantes, ['class' => 'form-control', 'min' => '0'] ) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="estado">Estado:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::select('estado', getEstadoVehiculo(), $p->estado , ['class' => 'form-select text-uppercase'] ) !!}
									</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-8">
								<label for="imagen_per">Ingrese una fotografia:</label>
								<div class="input-group mb-3">
									{!! Form::file('imagen_veh', ['class' => 'form-control', 'id'=>'customFile', 'accept'=>'image/*']) !!}
								</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-4">
								<label for="des_unidad">Destino Unidad:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('des_unidad',$p->des_unidad, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="fuente_adq">Fuente de Adquisición:</label>
									<div class="input-group">
									    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
									    	</span>
										{!! Form::text('fuente_adq', $p->fuente_adq, ['class' => 'form-control text-uppercase']) !!}
									</div>
							</div>

							<div class="col-md-4">
								<label for="documento_res">Documento de Recepción:</label>
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
						<h2 class="title"><i class="fas fa-image"></i> Imagen del Vehículo</h2>
					</div>
					<div class="inside">
						<div class="bloque-img">
							<div class="cuadrado-perfecto">
								<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_veh)}}" data-fancybox="gallery">
								<img src = "{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_veh)}}" class="img-thumbnail">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection