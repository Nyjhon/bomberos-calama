@extends('Maestro')

@section('title', 'Editar mi Perfil')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fab fa-instagram-square"></i><strong> Editar Avatar:</strong></h2>
				</div>
				<div class="inside">
					<div class="edit_avatar">
					{!! Form::open(['url' => '/perfil/edit/avatar', 'id' => 'form_avatar_change', 'files' => true]) !!}
						<a href="#" id="btn_avatar">
							<div class="overlay" id="avatar_change_overlay"><i class="fas fa-camera"></i></div>
							@if(is_null(Auth::user()->avatar))
			    				<img src="{{url('/imagenes/default-avatar.png')}}">
			    			@else
			    				<img src="{{url('/imagenes/uploads_user/'.Auth::id().'/av_'.Auth::user()->avatar)}}">
			    			@endif
		    			</a>
		    			{!! Form::file('avatar', ['id' => 'input_file_avatar', 'accept' => 'image/*','class' =>'form-control']) !!}
					{!! Form::close() !!}
					</div>
				</div>
			</div>

			<div class="panel shadow mtop32">
				<div class="header">
					<h2 class="title"><i class="fas fa-user-lock"></i><strong> Cambiar Contraseña:</strong></h2>
				</div>
				<div class="inside">
					{!! Form::open(['url' => '/perfil/edit/password']) !!}
						<div class="row">
							<div class="col-md-12">
								<label for="apassword">Contraseña actual:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::password('apassword', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-12">
								<label for="password">Nueva contraseña:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-12">
								<label for="cpassword">Confirmar contraseña:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::password('cpassword', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row mtop16">
							<div class="col-md-12">
								{!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-address-card"></i><strong> Editar Información:</strong></h2>
				</div>
				<div class="inside">
					{!! Form::open(['url' => '/perfil/edit/info']) !!}
						<div class="row">
							<div class="col-md-4">
								<label for="nombre">Nombre:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::text('nombre', Auth::user()->nombre, ['class' => 'form-control']) !!}
								</div>
							</div>
												
							<div class="col-md-5">
								<label for="apellido">Apellidos:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::text('apellido', Auth::user()->apellido, ['class' => 'form-control']) !!}
								</div>
							</div>

						</div>	
						<div class="row mtop16">					
							<div class="col-md-8">
								<label for="email">Correo Electrónico:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'disabled']) !!}
								</div>
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-md-4">
								<label for="genero">Genero:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::select('genero', ['1' =>'Hombre', '2' =>'Mujer'], Auth::user()->genero, ['class' => 'form-select']) !!}
								</div>
							</div>

							<div class="col-md-4">
								<label for="celular">Celular:</label>
								<div class="input-group">
									<span class="input-group-text" id="basic-addon1">
										<i class="far fa-keyboard"></i>
									</span>
									{!! Form::number('celular', Auth::user()->celular, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-md-12">
								{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
						

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div> 
@endsection