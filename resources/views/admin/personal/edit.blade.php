@extends('admin.maestro')
@section('title','Personal')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/4') }}"><i class="fas fa-user-tie"></i> PERSONAL</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/'.$p->id.'/editar') }}"><i class="fas fa-edit"></i> EDITAR</a>
	</li>
@endsection

@section('contenido')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
							
				<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-edit"></i><strong> Editar Personal</strong></h2>
				</div>
				<div class="inside">
					
					{!! Form::open([ 'url' => '/admin/personal/'.$p->id.'/editar', 'method' => 'POST', 'files' => true ]) !!}
					<label for="dat_per"><strong>MODIFIQUE LOS DATOS DEL PERSONAL:</strong></label>
					<div class="row">

						<div class="col-md-4">
							<label for="nombres">Nombres:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('nombres', $p->nombres, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="apellido_pat">Apellido Paterno:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('apellido_pat', $p->apellido_pat, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="apellido_mat">Apellido Materno:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('apellido_mat', $p->apellido_mat, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>
					</div>

					<div class="row mtop16">

						<div class="col-md-3">
							<label for="ci">Cédula de Identidad:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::number('ci', $p->ci, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
						</div>

						<div class="col-md-3">
							<label for="exp">Expedido:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::select('exp', getDepartamentoArray(),$p->exp,['class' => 'form-select text-uppercase'] ) !!}
							</div>
						</div>

						<div class="col-md-3">
							<label for="celular">Celular:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::number('celular', $p->celular, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
						</div>

					</div>

					<div class="row mtop16">

						<div class="col-md-4">
								<label for="fecha_nac">Fecha de nacimiento:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::date('fecha_nac',$p->fecha_nac, ['class' => 'form-control']) !!}
								</div>
						</div>

						<div class="col-md-4">
								<label for="grado">Grado:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::text('grado', $p->grado, ['class' => 'form-control text-uppercase'])!!}
								</div>
						</div>
					</div>
					<div class="row mtop16">

						<div class="col-md-4">
							<label for="licencia">Número de Licencia:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::number('licencia', $p->licencia, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
						</div>

						<div class="col-md-3">
							<label for="categoria">Categoría de Licencia:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('categoria', $p->categoria, ['class' => 'form-control text-uppercase'] ) !!}
							</div>
						</div>

					</div>
					
						
					<div class="row mtop16">
						<div class="col-md-4">
							<label for="seguro">Número de Seguro:</label>
							<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::number('seguro', $p->seguro, ['class' => 'form-control', 'min' => '0'] ) !!}
							</div>
						</div>
						<div class="col-md-4">
								<label for="fecha_des">Fecha de destino:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::date('fecha_des',$p->fecha_des, ['class' => 'form-control'])!!}
								</div>
						</div>

						<div class="col-md-4">
								<label for="fecha_alt">Fecha de alta:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::date('fecha_alt',$p->fecha_alt, ['class' => 'form-control'])!!}
								</div>
						</div>

					</div>

					<div class="row mtop16">
						
						<div class="col-md-6">
							<label for="unidad_des">Unidad de Destino:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('unidad_des', $p->unidad_des, ['class' => 'form-control text-uppercase']) !!}
									</div>
						</div>

						<div class="col-md-6">
							<label for="cargo_act">Cargo Actual:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('cargo_act', $p->cargo_act, ['class' => 'form-control text-uppercase']) !!}
									</div>
						</div>
					</div>
					<div class="row mtop16">
						<div class="col-md-6">
							<label for="destino_ant">Destino Anterior:</label>
							<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('destino_ant', $p->destino_ant, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-3">
							<label for="numero_esc">Número de Escalafón:</label>
							<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('numero_esc', $p->numero_esc, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-3">
							<label for="genero">Género:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::select('genero', getGeneroArray(),$p->genero,['class' => 'form-select text-uppercase'] ) !!}
							</div>
						</div>
		      		</div>

		      		<div class="row mtop16">

						<div class="col-md-3">
							<label for="antiguedad_grado">Antigüedad en el grado:</label>
							<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('antiguedad_grado', $p->antiguedad_grado, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-8">
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
								{!! Form::text('ubicacion', $p->ubicacion, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>

						<div class="col-md-6">
							<label for="referencia">Referencia:</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
								{!! Form::text('referencia', $p->referencia, ['class' => 'form-control text-uppercase']) !!}
							</div>
						</div>
					</div>

					<div class="row mtop16">
						<div class="col-md-3">
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
						<h2 class="title"><i class="fas fa-image"></i></i> Imagen del Personal</h2>
					</div>
					<div class="inside">	
						<div class="bloque-img">
							<div class="rectangulo cuadrado-perfecto">
								<a href="{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_per)}}" data-fancybox="gallery">
									<img src = "{{url('/imagenes/uploads/'.$p->file_path.'/'.$p->imagen_per)}}" class="img-thumbnail">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection