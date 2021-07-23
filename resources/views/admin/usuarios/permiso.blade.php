@extends('admin.maestro')
@section('title','Usuarios')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/usuarios/all') }}"><i class="fas fa-user-friends"></i> USUARIOS</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('admin/usuarios/'.$u->id.'/permiso') }}"><i class="fas fa-user-cog"></i> USUARIO: {{$u->nombre}} {{$u->apellido}} (ID: {{$u->id}})</a>
	</li>
@endsection
@section('contenido')
	<div class="container-fluid">
		<div class="page_user">
			<form action="{{url('/admin/usuarios/'.$u->id.'/permiso')}}" method="POST">
			@csrf
			<div class="row">
				@foreach(user_permisos() as $key => $value)
				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<h2 class="title">{!!$value['icon']!!} <strong>{{ $value['title']}}</strong></h2>
						</div>
						<div class="inside">
							@foreach($value['keys'] as $k => $v)
							<div class="form-check">
							  	<input class="form-check-input" name="{{$k}}" type="checkbox" value="true" id="flexCheckDefault" @if(kvfj($u->permisos, $k)) checked @endif>
							  	<label class="form-check-label" for="flexCheckDefault">{{ $v }}</label>
							</div>
							@endforeach

						</div>
					</div>
				</div>
				@endforeach
			</div>
				<div class="row mtop16">
					<div class="col-md-12">
						<div class="panel shadow">
							<div class="inside">
								<input type="submit" value="Guardar" class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
