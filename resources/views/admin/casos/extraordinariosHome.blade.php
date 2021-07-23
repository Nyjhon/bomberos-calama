@extends('admin.maestro')
@section('title','Casos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/casos/extraordinarios') }}"><i class="fas fa-exclamation-triangle"></i> CASOS</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="panel shadow">

			<div class="header">
				<h2 class="title"><i class="fas fa-exclamation-triangle"></i> CASOS</h2>
				<ul>
					@if(kvfj(Auth::user()->permisos,'añadir_caso'))
					<li>
						<a href="{{ url('/admin/casos/addExtraordinarios')}}"><i class="fas fa-plus" style="color: #dc3545"></i> AÑADIR CASOS</a>
					</li>
					@endif
					<li>
						<a href="#" id="btn_buscar"><i class="fas fa-search"  style="color: #dc3545"></i> BUSCAR Y EXPORTAR</a>
					</li>
				</ul>
			</div>

			

			<div class="inside">

				<div class="form_buscar" id="form_buscar">
					{!! Form::open(['url'=>'/admin/casos/extraordinarios/buscar'])!!}
					<div class="row">	
						<div class="col-md-2">
							{!! Form::date('buscar', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
						</div>
						<div class="col-md-2">
							{!! Form::select('filtrar',['0'=>'Fecha'],0,['class'=>'form-select'])!!}
						</div>
						<div class="col-md-2">
							{!! Form::submit('Buscar',['class' => 'btn btn-primary', 'style' => 'background-color: #dc3545']) !!}
						</div>
					</div>
					{!! Form::close() !!}
					{!! Form::open(['url'=>'/admin/casos/extraordinarios/exportar_fecha'])!!}
					<div class="row mtop16">	
						<div class="col-md-2">
							{!! Form::date('exportar', null, ['class' => 'form-control', 'required'])  !!}
						</div>
						
						<div class="col-md-2">
							<button type="submit" class="btn btn-success" style="background-color: #53BC4A;"><i class="fas fa-file-excel"></i> Exportar por dia</button>
						</div>
					</div>
					{!! Form::close() !!}
					{!! Form::open(['url'=>'/admin/casos/extraordinarios/exportar_mes'])!!}
					<div class="row mtop16">	
						<div class="col-md-2">
							<div class="input-group">
							{!! Form::select('mes',getMesArray(),1, ['class' => 'form-select']) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="input-group">
								{!! Form::number('año', \Carbon\Carbon::now()->year, ['class' => 'form-control','placeholder' => 'AÑO', 'required', 'min' => 0]) !!}
							</div>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-success" style="background-color: #53BC4A;"><i class="fas fa-file-excel"></i> Exportar por mes</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
				
				<div>
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					@if(kvfj(Auth::user()->permisos,'casos'))
					  <li class="nav-item">
					    <a class="nav-link " href="{{ url('/admin/casos/bomberos') }}"><i class="fas fa-list"></i> FORMULARIO DE BOMBEROS</a>
					  </li>
					  @endif
					  @if(kvfj(Auth::user()->permisos,'casos'))
					  <li class="nav-item">
					    <a class="nav-link " href="{{ url('/admin/casos/auxilios') }}"><i class="fas fa-list"></i> FORMULARIO DE AUXILIOS</a>
					  </li>
					  @endif
					  @if(kvfj(Auth::user()->permisos,'casos'))
					  <li class="nav-item">
					    <a class="nav-link active" style="background-color: #dc3545" href="{{ url('/admin/casos/extraordinarios') }}"><i class="fas fa-list"></i> SERVICIOS EXTRAORDINARIOS</a>
					  </li>
					  @endif
				</ul>
				</div>
				<table class="table table-striped table-hover mtop16">
					<thead class="table-dark">
						<tr>
							<td>N°</td>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Lugar del Hecho Calle y/o Avenida</td>
							<td>Coordenadas</td>
							<td>Tipo de Servicio</td>
							<td></td>

						</tr>
					</thead>
					<tbody>
						<?php $i=1; 
						?>
						@foreach($extraordinarios as $p)
							<tr>
								<td width="30"><?php echo $i; ?></td>
								<td width="90">{{ \Carbon\Carbon::parse($p->fecha_ext)->format('d-m-Y') }}</td>
								<td width="75" class="text-uppercase">{{ $p->hora_ext }}</td>
								<td width="250" class="text-uppercase">{{ $p->calle }}</td>
								<td width="250" class="text-uppercase">{{ $p->coordenadas }}</td>
								<td width="250" class="text-uppercase">{{ getTipoKey($p->tipo) }}</td>
								<td width="155">
									<div class="opts">
										@if(kvfj(Auth::user()->permisos,'ver_caso'))
							 			<a href="{{ url('admin/casos/extraordinarios/'.$p->id.'/ver') }}" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye" style="color: #dc3545"></i></a>
							 			@endif
							 			@if(kvfj(Auth::user()->permisos,'editar_caso'))
										<a href="{{ url('admin/casos/extraordinarios/'.$p->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit" style="color: #dc3545"></i></a>
										@endif
										@if(kvfj(Auth::user()->permisos,'eliminar_caso'))
										<a href="#" data-object="{{$p->id}}" data-path="admin/casos/extraordinarios" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt" style="color: #dc3545"></i></a>
										@endif
									</div>
								</td>
							</tr>
							<?php $i++; 
						?>
						@endforeach
					</tbody>
				</table>
				<td colspan="6">{!! $extraordinarios->render() !!}</td>
			</div>
			</div>

		</div>
	</div>
@endsection