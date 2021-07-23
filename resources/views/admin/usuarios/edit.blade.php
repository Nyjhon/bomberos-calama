@extends('admin.maestro')
@section('title','Usuarios')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/usuarios/all') }}"><i class="fas fa-user-friends"></i> USUARIOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('admin/usuarios/'.$u->id.'/editar') }}"><i class="fas fa-user-cog"></i> USUARIO: {{$u->nombre}} {{$u->apellido}} (ID: {{$u->id}})</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="page_user">
			<div class="row">
				<div class="col-md-4">
					<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-user"></i> Información</h2>
					</div>
					<div class="inside">
						<div class="mini_profile">
							@if(is_null($u->avatar))
								<img src="{{url('/imagenes/default-avatar.png')}}" class="avatar">
							@else
								<img src="{{url('/imagenes/uploads_user/'.$u->id.'/av_'.$u->avatar)}}" class="avatar">
							@endif
							<div class="info">
								<span class="title"><i class="far fa-id-card"></i> Nombre:</span>
								<span class="text">{{$u->nombre}} {{$u->apellido}}</span>

								<span class="title"><i class="fas fa-user-shield"></i> Estado del Usuario:</span>
								<span class="text">{{getUserStatusArrayKey(null, $u->status)}}</span>

								<span class="title"><i class="far fa-envelope"></i> Correo Electrónico:</span>
								<span class="text">{{$u->email}}</span>

								<span class="title"><i class="far fa-calendar-alt"></i> Fecha de Registro:</span>
								<span class="text">{{$u->created_at}}</span>

								<span class="title"><i class="fas fa-user-tie"></i> Rol de Usuario:</span>
								<span class="text">{{getRoleUserArraykey(null, $u->role)}}</span>

							</div>
							@if(kvfj(Auth::user()->permisos,'usuarios_banear'))
								@if($u->status == "100")
									<a href="{{url('/admin/usuarios/'.$u->id.'/banear')}}" class="btn btn-success">Activar Usuario</a>
								@else
									<a href="{{url('/admin/usuarios/'.$u->id.'/banear')}}" class="btn btn-danger">Suspender Usuario</a>
								@endif
							@endif
						</div>
					</div>
					</div>
				</div>	
			
				<div class="col-md-8">
					<div class="panel shadow">
						<div class="header">
							<h2 class="title"><i class="fas fa-user-edit"></i> Editar Información</h2>
						</div>
						<div class="inside">
							@if(kvfj(Auth::user()->permisos,'usuarios_edit'))
							{!! Form::open(['url' => '/admin/usuarios/'.$u->id.'/editar']) !!}
							<div class="row">

								<div class="col-md-6">
									<label for="tipo">Tipo de usuario:</label>
									<div class="input-group">
					    					<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
					    					</span>
										{!! Form::select('user_tipo', getRoleUserArraykey('list', null),$u->role, ['class' => 'form-select']) !!}
									</div>
								</div>

							</div>
							<div class="row mtop16">
								<div class="col-md-12">
									{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
								</div>
							</div>
							{!! Form::close() !!}
							@endif
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
