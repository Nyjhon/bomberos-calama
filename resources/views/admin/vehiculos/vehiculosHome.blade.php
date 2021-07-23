@extends('admin.maestro')
@section('title','Parqueo Automotor')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/vehiculos/5') }}"><i class="fas fa-truck-pickup"></i> PARQUEO AUTOMOTOR</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid mtop16">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="far fa-list-alt"></i><strong> LISTA DE VEHÍCULOS:</strong></h2>

				<ul>
					@if(kvfj(Auth::user()->permisos,'vehiculos'))
					<li>
						<a href="{{ url('/admin/vehiculos/5/add')}}"><i class="fas fa-plus"></i> AÑADIR VEHÍCULO</a>
					</li>
					@endif
					<li>
						<a href="#">FILTRAR POR ESTADO <i class="fas fa-chevron-down"></i></a>
						<ul class="shadow">
							<li><a href="{{url('/admin/vehiculos/5')}}"><i class="fas fa-list"></i> TODOS</a></li>
							<li><a href="{{url('/admin/vehiculos/1')}}"><i class="fas fa-thumbs-up"></i> NUEVOS</a></li>
							<li><a href="{{url('/admin/vehiculos/2')}}"><i class="fas fa-check-circle"></i> REGULAR</a></li>
							<li><a href="{{url('/admin/vehiculos/3')}}"><i class="fas fa-thumbs-down"></i> MALOS</a></li>
							<li><a href="{{url('/admin/vehiculos/4')}}"><i class="fas fa-times-circle"></i> EN DESUSO</a></li>
						</ul>
					</li>
					<li>
						<a href="#" id="btn_buscar">
							<i class="fas fa-search"></i> BUSCAR
						</a>

					</li>
					<li>
						<a href="{{ url('/admin/vehiculos/5/excel')}}"><i class="fas fa-file-excel"></i> EXPORTAR A EXCEL</a>
					</li>	
				</ul>

			</div>
			<div class="inside">

				<div class="form_buscar" id="form_buscar">
					{!! Form::open(['url'=>'/admin/vehiculos/buscar'])!!}
					<div class="row">	
						<div class="col-md-4">
							{!! Form::text('buscar',null,['class' => 'form-control text-uppercase', 'placeholder'=>'Busqueda por Placa', 'required']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::select('filtrar',['0'=>'Placa'],0,['class'=>'form-select'])!!}
						</div>
						<div class="col-md-2">
							{!! Form::submit('Buscar',['class' => 'btn btn-primary']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>

				<table class="table table-striped table-hover">
					<thead class="table-dark">
						<tr>
							<td>N°</td>
							<td>Sigla</td>
							<td>Placa</td>
							<td>Clase</td>
							<td>Origen</td>
							<td>Color</td>
							<td>Estado Actual</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; 
						?>
						@foreach($vehiculos as $p)
							<tr>
								<td width="30"><?php echo $i; ?></td>
								<td width="100" class="text-uppercase">{{ $p->sigla }}</td>
								<td width="100" class="text-uppercase">{{ $p->placa }}</td>
								<td width="160" class="text-uppercase">{{ $p->clase }}</td>
								<td width="100" class="text-uppercase">{{ $p->origen }}</td>
								<td width="160" class="text-uppercase">{{ $p->color }}</td>
								<td width="120" class="text-uppercase">{{ getEstadoVehiculokey($p->estado) }}</td>
								<td width="130"> 
									<div class="opts">
									@if(kvfj(Auth::user()->permisos,'vehiculos_ver'))
							 		<a href="{{ url('admin/vehiculos/'.$p->id.'/ver') }}" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
							 		@endif
							 		@if(kvfj(Auth::user()->permisos,'vehiculos_edit'))
									<a href="{{ url('admin/vehiculos/'.$p->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
									@endif
									@if($p->estado == '4')
										@if(kvfj(Auth::user()->permisos,'vehiculos_eliminar'))
										<a href="#" data-object="{{$p->id}}" data-path="admin/vehiculos" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar" style="color:red"><i class="fas fa-trash-alt"></i></a>
										@endif
									@endif
									</div>
								</td>
							</tr>
							<?php $i++; 
							?>
						@endforeach
					</tbody>
				</table>
				<td colspan="6">{!! $vehiculos->render() !!}</td>
			</div>
		</div>
	</div>
@endsection