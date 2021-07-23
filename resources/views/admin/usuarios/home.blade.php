@extends('admin.maestro')
@section('title','Usuarios')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/usuarios/all') }}"><i class="fas fa-user-friends"></i> USUARIOS</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		
		<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-user-friends"></i><strong> USUARIOS</strong></h2>
		</div>
		<div class="inside">
			<div class="row">
				<div class="col-md-2 offset-md-10">
					<div class="dropdown">
						<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
    						<i class="fas fa-filter"></i> Filtrar
  						</button>
  						 <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
  						 	<li><a class="dropdown-item" href="{{url('/admin/usuarios/all')}}">Todos</a></li>
  						 	<li><a class="dropdown-item" href="{{url('/admin/usuarios/0')}}">Activos</a></li>
  						 	<li><a class="dropdown-item" href="{{url('/admin/usuarios/100')}}">Suspendidos</a></li>
  						 </ul>
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover mtop16">
				<thead class="table-dark">
					<tr>
						<td>N°</td>
						<td>NOMBRE</td>
						<td>APELLIDO</td>		
						<td>EMAIL</td>
						<td>ESTADO</td>
						<td>ESTADO</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; 
						?>
					@foreach($usuarios as $user)
					<tr>
						<td width="30"><?php echo $i; ?></td>
						<td>{{ $user->nombre }}</td>
						<td>{{ $user->apellido }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ getUserStatusArrayKey(null, $user->status) }}</td>
						<td>{{ getRoleUserArraykey(null, $user->role) }}</td>
						<td>
							<div class="opts">
							@if(kvfj(Auth::user()->permisos,'usuarios_edit'))
							<a href="{{ url('admin/usuarios/'.$user->id.'/editar') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
							@endif
							@if(kvfj(Auth::user()->permisos,'usuarios_permiso'))
							<a href="{{ url('admin/usuarios/'.$user->id.'/permiso') }}" data-toggle="tooltip" data-placement="top" title="permiso"><i class="fas fa-user-cog"></i></a>
							@endif
							@if($user->status=="100")
								@if(kvfj(Auth::user()->permisos,'usuarios_eliminar'))
								<a href="#" data-object="{{$user->id}}" data-path="admin/usuarios" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar" style="color:red"><i class="fas fa-trash-alt"></i></a>
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
			<td colspan="6">{!! $usuarios->render() !!}</td>
		</div>
		</div>

	</div>
@endsection
