@extends('admin.maestro')
@section('title','Configuraciones')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/config') }}"><i class="fas fa-cogs"></i> CONFIGURACIONES</a>
	</li>
@endsection
@section('contenido')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-edit"></i><strong> Editar carrusel</strong></h2>
					</div>
					<div class="inside">
						{!! Form::open(['url' => '/admin/config/slider/'.$slider->id.'/editar']) !!}
							<div class="col-md-12">
							<label for="nombre">Nombre:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::text('nombre', $slider->nombre, ['class' => 'form-control text-uppercase']) !!}
								</div>
							</div>

							<div class="col-md-12 mtop16">
							<label for="visible">Visible:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::select('visible', ['0' => 'NO VISIBLE', '1' => 'VISIBLE'],$slider->visible,['class' => 'form-select text-uppercase']) !!}
								</div>
							</div>

							<label for="imagen" class="mtop16">Imagen Destacada:</label>
							<div class="row">
								<div class="col-md-4">
									<img src="{{url('/imagenes/uploads/'.$slider->file_path.'/'.$slider->file_name)}}" class="img-fluid">

								</div>
							</div>

							<div class="col-md-12 mtop16">
							<label for="contenido">Contenido:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::textarea('contenido', $slider->contenido,['class' => 'form-select', 'rows' => '3']) !!}
								</div>
							</div>

							<div class="col-md-12 mtop16">
							<label for="orden">Order de aparición:</label>
								<div class="input-group">
							    	<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									{!! Form::number('orden', $slider->orden, ['class' => 'form-control', 'min' => '0']) !!}
								</div>
							</div>
							{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
								{!! Form::close() !!}
						{!! FoRm::close() !!}
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
