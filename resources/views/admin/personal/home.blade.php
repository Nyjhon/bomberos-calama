@extends('admin.maestro')
@section('title','Personal')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/personal/4') }}"><i class="fas fa-user-tie"></i> PERSONAL</a>
	</li>
@endsection

@section('contenido')

	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="far fa-list-alt"></i><strong> LISTA DEL PERSONAL </strong></h2>

			<ul>
				@if(kvfj(Auth::user()->permisos,'personal_add'))
				<li>
					<a href="{{ url('/admin/personal/4/add')}}"><i class="fas fa-plus"></i> AÑADIR PERSONAL</a>
				</li>
				@endif
				<li>
					<a href="#">FILTRAR POR: <i class="fas fa-chevron-down"></i></a>
					<ul class="shadow">
						<li><a href="{{url('/admin/personal/4')}}"><i class="fas fa-list"></i> TODOS</a></li>
						<li><a href="{{url('/admin/personal/1')}}"><i class="fas fa-male"></i> VARONES</a></li>
						<li><a href="{{url('/admin/personal/2')}}"><i class="fas fa-female"></i> MUJERES</a></li>
						<li><a href="{{url('/admin/personal/3')}}"><i class="fas fa-times-circle"></i> DE BAJA</a></li>
					</ul>
				</li>
				<li>
					<a href="#" id="btn_buscar"><i class="fas fa-search"></i> BUSCAR</a>
					
				</li>
				<li>
					<a href="{{ url('/admin/personal/5/excel')}}"><i class="fas fa-file-excel"></i> EXPORTAR A EXCEL</a>
				</li>
			</ul>

		</div>

		<div class="inside">

			<div class="form_buscar" id="form_buscar">
						{!! Form::open(['url'=>'/admin/personal/buscar'])!!}
						<div class="row">	
							<div class="col-md-4">
								{!! Form::number('buscar',null,['class' => 'form-control text-uppercase', 'placeholder'=>'Busqueda por Número de carnet', 'required']) !!}
							</div>
							<div class="col-md-4">
								{!! Form::select('filtrar',['0'=>'Número de Carnet'],0,['class'=>'form-select'])!!}
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
						<td>Nombres</td>	
						<td>Ap. Paterno</td>
						<td>Ap. Materno</td>
						<td>C.I.</td>
						<td>Exp.</td>
						<td>Celular</td>				
						<td>Grado</td>
						
						<td></td>
					</tr>
					
				</thead>
				<tbody>
					<?php $i=1; 
					?>
					@foreach($personal as $p)
						<tr>
							<td width="30"><?php echo $i; ?></td>
							<td width="120" class="text-uppercase">{{ $p->nombres }}</td>
							<td width="120" class="text-uppercase">{{ $p->apellido_pat }}</td>
							<td width="120" class="text-uppercase">{{ $p->apellido_mat }}</td>
							<td width="100" class="text-uppercase">{{ $p->ci }}</td>
							<td width="120" class="text-uppercase">{{ getDepartamentoArrayKey($p->exp) }}</td>
							<td width="120" class="text-uppercase">{{ $p->celular }}</td>
							<td width="120" class="text-uppercase">{{ $p->grado }}</td>
							
							<td width="155">
								<div class="opts">
									@if(kvfj(Auth::user()->permisos,'personal_ver'))
							 		<a href="{{ url('admin/personal/'.$p->id.'/ver') }}" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye" style="pointer-events: none;"></i></a>
							 		@endif
							 		@if(kvfj(Auth::user()->permisos,'personal_edit'))
									<a href="{{ url('admin/personal/'.$p->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
									@endif
							
									@if($p->fecha_alt != null)
										@if(kvfj(Auth::user()->permisos,'personal_eliminar'))
										<a href="#" data-object="{{$p->id}}" data-path="admin/personal" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar" style="color:red"><i class="fas fa-trash-alt"></i></a>
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
			<td colspan="6">{!! $personal->render() !!}</td>	
		</div>
		</div>

	</div>

@endsection

