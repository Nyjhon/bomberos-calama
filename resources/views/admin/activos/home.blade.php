@extends('admin.maestro')
@section('title','Activos fijos')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/activos/5') }}"><i class="fas fa-boxes"></i> ACTIVOS FIJOS</a>
	</li>
@endsection

@section('contenido')

	<div class="container-fluid">
		<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="far fa-list-alt"></i><strong> LISTADO DE ACTIVOS FIJOS</strong></h2>

					<ul>
						@if(kvfj(Auth::user()->permisos,'activos_add'))
						<li>
							<a href="{{ url('/admin/activos/5/add')}}"><i class="fas fa-plus"></i> AÑADIR ACTIVO FIJO</a>
						</li>
						@endif
						<li>
							<a href="#">FILTRAR POR ESTADO <i class="fas fa-chevron-down"></i></a>
							<ul class="shadow">
								<li><a href="{{url('/admin/activos/5')}}"><i class="fas fa-list"></i> TODOS</a></li>
								<li><a href="{{url('/admin/activos/1')}}"><i class="fas fa-thumbs-up"></i> BUENOS</a></li>
								<li><a href="{{url('/admin/activos/2')}}"><i class="fas fa-check-circle"></i> REGULAR</a></li>
								<li><a href="{{url('/admin/activos/3')}}"><i class="fas fa-thumbs-down"></i> MALOS</a></li>
								<li><a href="{{url('/admin/activos/4')}}"><i class="fas fa-times-circle"></i> EN DESUSO</a></li>
							</ul>
						</li>
						<li>
							<a href="#" id="btn_buscar">
								<i class="fas fa-search"></i> BUSCAR
							</a>

						</li>
						<li>
							<a href="{{ url('/admin/activos/5/excel')}}"><i class="fas fa-file-excel"></i> EXPORTAR A EXCEL</a>
						</li>	
					</ul>

				</div>
				<div class="inside">

					<div class="form_buscar" id="form_buscar">
						{!! Form::open(['url'=>'/admin/activos/buscar'])!!}
						<div class="row">	
							<div class="col-md-4">
								{!! Form::text('buscar',null,['class' => 'form-control text-uppercase', 'placeholder'=>'Busqueda por Código', 'required']) !!}
							</div>
							<div class="col-md-4">
								{!! Form::select('filtrar',['0'=>'Código'],0,['class'=>'form-select'])!!}
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
						 			<td>Código</td>
						 			<td>Fecha de ingreso</td>
						 			<td>Estado</td>
						 			<td>Nombre</td>
						 			<td>Nombre del Responsable</td>
						 			<td>Procedencia</td>
						 			<td></td>

						 		</tr>
						 	</thead>
						 	<tbody>
						 		<?php $i=1; 
								?>
						 		@foreach($activos as $p)
						 			<tr>
						 				<td width="30"><?php echo $i; ?></td>
						 				<td class="text-uppercase">{{ $p->codigo }}</td>
						 				<td class="text-uppercase">{{ $p->fecha_ing }}</td>
						 				<td class="text-uppercase">{{ getEstadoActivoKey($p->estado) }}</td>
						 				<td class="text-uppercase">{{ $p->nombre }}</td>
						 				<td class="text-uppercase">{{ $p->nombre_res }}</td>
						 				<td class="text-uppercase">{{ $p->procedencia }}</td>
						 				
						 				<td>
						 					<div class="opts">
						 						@if(kvfj(Auth::user()->permisos,'activos_ver'))
							 					<a href="{{ url('admin/activos/'.$p->id.'/ver') }}" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
							 					@endif
							 					@if(kvfj(Auth::user()->permisos,'activos_edit'))
												<a href="{{ url('admin/activos/'.$p->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
												@endif
												@if($p->fecha_alt != null)
													@if(kvfj(Auth::user()->permisos,'activos_eliminar'))
													<a href="#" data-object="{{$p->id}}" data-path="admin/activos" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar" style="color:red"><i class="fas fa-trash-alt"></i></a>
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
						<tr>
							<td colspan="8">{!! $activos->render() !!}</td>
						</tr>
				</div>
		</div>
		
	</div>	
	
@endsection