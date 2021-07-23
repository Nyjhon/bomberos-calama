@extends('admin.maestro')
@section('title','Parqueo Automotor')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/5') }}"><i class="fas fa-truck-pickup"></i> PARQUEO AUTOMOTOR</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/5/add') }}"><i class="fas fa-plus"></i> AÑADIR VEHÍCULO</a>
	</li>
@endsection
@section('contenido')

	<div class="container-fluid">
		<div class="panel sahdow">
			<div class="header">
				<h2 class="title"><i class="fas fa-plus"></i> AÑADIR VEHÍCULO</h2>
			</div>
			<div class="inside">
				
				{!! Form::open(['url' => '/admin/vehiculos/5/add', 'method' => 'POST', 'files' => true]) !!}

				<div class="row">
					
					<div class="col-md-3">
						<label for="codigo">Sigla:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('sigla', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="clase">Clase:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('clase', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="marca">Marca:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('marca', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="tipo">Tipo:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('tipo', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>
				</div>

				<div class="row mtop16">
					<div class="col-md-2">
						<label for="año_modelo">Año del Modelo:</label>
						<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
							{!! Form::number('año_modelo', null, ['class' => 'form-control', 'min' => '0'] ) !!}
						</div>
					</div>

					<div class="col-md-3">
						<label for="origen">Origen:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('origen', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

				</div>

				<div class="row mtop16">
					<div class="col-md-3">
						<label for="placa">Placa:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('placa', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="placa_gen">Placa Generada DNFR:</label>
							<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('placa_gen', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="crpva">N° CRPVA:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('crpva', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="soat">N° Roseta Soat:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::number('soat', null, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
					</div>
				</div>

				<div class="row mtop16">
					<div class="col-md-4">
						<label for="b_sisa">N° de B-SISA:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::number('b_sisa', null, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
					</div>

					<div class="col-md-4">
						<label for="chasis">N° de Chasis:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('chasis', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>
				</div>

				<div class="row mtop16">
					<div class="col-md-4">
						<label for="n_motor">N° de Motor:</label>
							<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('n_motor', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="cilindrada">Cilindrada:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('cilindrada', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-3">
						<label for="color">Color:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('color', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-2">
						<label for="n_ocupantes">N° de Ocupantes:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::number('n_ocupantes', null, ['class' => 'form-control text-uppercase', 'min' => '0'] ) !!}
							</div>
					</div>

				</div>

				<div class="row mtop16">
					<div class="col-md-3">
						<label for="estado">Estado:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::select('estado', getEstadoVehiculo(), 1 , ['class' => 'form-select text-uppercase'] ) !!}
							</div>
					</div>

					<div class="col-md-6">
						<label for="imagen_per">Ingrese una fotografía:</label>
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
								{!! Form::text('des_unidad', 'DIR. DPTAL. BOMBEROS', ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-4">
						<label for="fuente_adq">Fuente de Adquisición:</label>
							<div class="input-group">
							    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
							    	</span>
								{!! Form::text('fuente_adq', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
					</div>

					<div class="col-md-4">
						<label for="documento_res">Documento de Recepción:</label>
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