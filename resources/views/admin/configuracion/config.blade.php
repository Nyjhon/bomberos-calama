@extends('admin.maestro')
@section('title','Configuraciones')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/config') }}"><i class="fas fa-cogs"></i> CONFIGURACIONES</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-cogs"></i><strong> CONFIGURACIONES</strong></h2>
			</div>
			<div class="inside">
				{!! Form::open(['url' => '/admin/config']) !!}
				<div class="row">
					<div class="col-md-4">
 					<label for="nombre">Nombre de la Tienda:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('nombre', Config::get('bomberos.nombre'), ['class' => 'form-control']) !!}
						</div>
 					</div>

 					<div class="col-md-4">
 					<label for="latitud">Latitud:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('latitud', Config::get('bomberos.latitud'), ['class' => 'form-control']) !!}
						</div>
 					</div>

 					<div class="col-md-4">
 					<label for="longitud">Longitud:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('longitud', Config::get('bomberos.longitud'), ['class' => 'form-control']) !!}
						</div>
 					</div>				

 				</div>
 				<div class="row mtop16">
 					<div class="col-md-8">
 						<label for="ubicacion">Ubicación:</label>
							<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('ubicacion', Config::get('bomberos.ubicacion'), ['class' => 'form-control']) !!}
							</div>
 					</div>
 					<div class="col-md-4">
 						<label for="dimension">Dimensión superficie total:</label>
							<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('dimension', Config::get('bomberos.dimension'), ['class' => 'form-control']) !!}
							</div>
 					</div>
 				</div>
	 			<div class="row mtop16">
	 				<div class="col-md-4">
 						<label for="tel_secretaria">Telefono de Secretaría a:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('tel_secretaria', Config::get('bomberos.tel_secretaria'), ['class' => 'form-control']) !!}
						</div>
 					</div>
 					<div class="col-md-4">
 						<label for="tel_cooporativo">Telefono Cooporativo:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('tel_cooporativo', Config::get('bomberos.tel_cooporativo'), ['class' => 'form-control']) !!}
						</div>
 					</div>
 					<div class="col-md-4">
 						<label for="tel_emergencia">Telefono de Emergencia:</label>
						<div class="input-group">
		    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
		    					</span>
							{!! Form::text('tel_emergencia', Config::get('bomberos.tel_emergencia'), ['class' => 'form-control']) !!}
						</div>
 					</div>
				</div>
				<div class="row mtop16">
					<div class="col-md-6">
	 					<label for="detalle">Detalle del Edificio:</label>
							<div class="input-group">
			    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
			    					</span>
								{!! Form::text('detalle', Config::get('bomberos.detalle'), ['class' => 'form-control']) !!}
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

	<div class="container-fluid mtop16">
		<div class="row">
			<div class="col-md-4">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-plus"></i><strong> AGREGAR IMAGENES</strong></h2>
					</div>
					<div class="inside">
						{!! Form::open(['url' => '/admin/config/slider/add', 'files' => true]) !!}
							<div class="col-md-12">
								<label for="nombre">Nombre:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-12 mtop16">
							<label for="visible">Visible:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::select('visible', ['0' => 'NO VISIBLE', '1' => 'VISIBLE'],1,['class' => 'form-select text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-12 mtop16">
								<label for="imagen">Imagen Destacada:</label>
								<div class="input-group mb-3">
									{!! Form::file('imagen', ['class' => 'form-control', 'id'=>'customFile', 'accept'=>'image/*']) !!}
								</div>

							</div>

							<div class="col-md-12 mtop16">
							<label for="contenido">Contenido:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::textarea('contenido', null,['class' => 'form-select', 'rows' => '3']) !!}
								</div>
							</div>

							<div class="col-md-12 mtop16">
							<label for="orden">Order de aparición:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::number('orden', 0, ['class' => 'form-control', 'min' => '0']) !!}
								</div>
							</div>
							{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
								{!! Form::close() !!}
						{!! FoRm::close() !!}
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="far fa-images"></i><strong> IMÁGENES PARA EL CARRUSEL</strong></h2>
					</div>
					<div class="inside">
						<table class="table">
							<thead>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</thead>
						<tbody>
							@foreach($slider as $slider)
							<tr>
								<td width="180"><img src="{{url('/imagenes/uploads/'.$slider->file_path.'/'.$slider->file_name)}}" class="img-fluid"> 
								</td>
								<td>
									<div  class="slider_content text-uppercase">
									<h1>{{$slider->nombre}}</h1>
									<h2>{{$slider->contenido}}</h2>
									</div>
								</td>
								<td class="slider_content">
									<h2>{{$slider->orden}}</h2>
								</td>
								<td  width="100px">
									<div class="opts">
				 						
					 					@if(kvfj(Auth::user()->permisos,'config'))
										<a href="{{ url('admin/config/slider/'.$slider->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
										@endif
										@if(kvfj(Auth::user()->permisos,'config'))
										<a href="#" data-object="{{$slider->id}}" data-path="admin/config/slider" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>
										@endif
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
