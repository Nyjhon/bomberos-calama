@extends('admin.maestro')
@section('title','Personal')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/4') }}"><i class="fas fa-user-tie"></i> PERSONAL</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/add') }}"><i class="fas fa-plus"></i> AÑADIR PERSONAL</a>
	</li>
@endsection

@section('contenido')
	<div class="container-fluid">
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i>Añadir Personal</h2>
		</div>
		<div class="inside">
			
			{!! Form::open([ 'url' => '/admin/personal/4/add', 'method' => 'POST', 'files' => true ]) !!}
			<label for="dat_per"><strong>INGRESE LOS DATOS DEL PERSONAL:</strong></label>
			<div class="row">

				<div class="col-md-4">
					<label for="nombres">Nombres:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('nombres', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="apellido_pat">Apellido Paterno:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('apellido_pat', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="apellido_mat">Apellido Materno:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('apellido_mat', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-3">
					<label for="ci">Cédula de Identidad:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::number('ci', null, ['class' => 'form-control', 'min' => '0'] ) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="exp">Expedido:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::select('exp', getDepartamentoArray(),'1',['class' => 'form-select text-uppercase'] ) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="celular">Celular:</label>
					<div class="input-group">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::number('celular', null, ['class' => 'form-control', 'min' => '0'] ) !!}
					</div>
				</div>

			</div>

			<div class="row mtop16">

				<div class="col-md-3">
						<label for="fecha_nac">Fecha de nacimiento:</label>
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
							{!! Form::date('fecha_nac',null, ['class' => 'form-control']) !!}
						</div>
				</div>

				<div class="col-md-3">
						<label for="grado">Grado:</label>
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
							{!! Form::text('grado', null, ['class' => 'form-control text-uppercase'])!!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="licencia">Número de Licencia:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::number('licencia', null, ['class' => 'form-control', 'min' => '0'] ) !!}
					</div>
				</div>

				<div class="col-md-2">
					<label for="categoria">Categoría de Licencia:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('categoria', null, ['class' => 'form-control text-uppercase'] ) !!}
					</div>
				</div>

			</div>
			
				
			<div class="row mtop16">
				<div class="col-md-3">
					<label for="seguro">Número de Seguro:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::number('seguro', null, ['class' => 'form-control', 'min' => '0'] ) !!}
					</div>
				</div>

				<div class="col-md-3">
						<label for="fecha_des">Fecha de destino:</label>
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
							{!! Form::date('fecha_des',null, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-3">
						<label for="fecha_alt">Fecha de alta:</label>
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
							{!! Form::date('fecha_alt',null, ['class' => 'form-control','disabled'])!!}
						</div>
				</div>

				<div class="col-md-2">
					<label for="genero">Género:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::select('genero', getGeneroArray(),'1',['class' => 'form-select text-uppercase'] ) !!}
					</div>
				</div>

			</div>

			<div class="row mtop16">
				
				<div class="col-md-4">
					<label for="unidad_des">Unidad de Destino:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('unidad_des', 'DIR. DPTAL. BOMBEROS ORURO', ['class' => 'form-control text-uppercase']) !!}
							</div>
				</div>

				<div class="col-md-4">
					<label for="cargo_act">Cargo Actual:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('cargo_act', null, ['class' => 'form-control text-uppercase']) !!}
							</div>
				</div>

				<div class="col-md-4">
					<label for="destino_ant">Destino Anterior:</label>
					<div class="input-group"><span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('destino_ant', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

      		</div>

      		<div class="row mtop16">

				<div class="col-md-3">
					<label for="numero_esc">Número de Escalafón:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('numero_esc', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="antiguedad_grado">Antigüedad en el grado:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('antiguedad_grado', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

				<div class="col-md-6">
						<label for="imagen_per">Ingrese una fotografía:</label>
						<div class="input-group mb-3">
							{!! Form::file('imagen_per', ['class' => 'form-control', 'id'=>'customFile', 'accept'=>'image/*']) !!}
						</div>
				</div>

			</div>

			<div class="row mtop16">
				<div class="col-md-6">
					<label for="ubicacion">Ubicación de domicilio:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('ubicacion', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>

				<div class="col-md-6">
					<label for="referencia">Referencia:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						{!! Form::text('referencia', null, ['class' => 'form-control text-uppercase']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-3">
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}				
		</div>
		</div>

	</div>
@endsection