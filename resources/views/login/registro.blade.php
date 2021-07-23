@extends('login.maestro')

@section('titulo','Registrarse')

@section('content')
<div class="box box_registro shadow">

	<div class="header">
			<a href="{{ url('/')}}">
				<img src="{{ url('/static/imagenes/icono.png')}}">
			</a>
	</div>
	<div class="inside">
		
	    {!! Form::open(['url' => '/registro']) !!}

		<label for="nombre">Nombre:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-user"></i></div>
	    	</div>
	    	{!! Form::text('nombre', null, ['class'=>'form-control', 'required'])!!}
		</div>

		<label for="apellido" class="mtop16">Apellido:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-user"></i></div>
	    	</div>
	    	{!! Form::text('apellido', null, ['class'=>'form-control', 'required'])!!}
		</div>
	
	    <label for="email" class="mtop16">Correo Electrónico:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-envelope-open-text"></i></div>
	    	</div>
	    	{!! Form::email('email', null, ['class'=>'form-control', 'required'])!!}
		</div>

		<label for="password" class="mtop16">Contraseña:</label>
		<div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-key"></i></div>
	    	</div>
	   		{!! Form::password('password', ['class'=>'form-control', 'required'])!!}
		</div>

		<label for="cpassword" class="mtop16">Confirmar contraseña:</label>
		<div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-key"></i></div>
	    	</div>
	   		{!! Form::password('cpassword', ['class'=>'form-control', 'required'])!!}
		</div>


			{!! Form::submit('Registrarse',['class'=>'btn btn-primary mtop16'])!!}
	    	{!! Form::close() !!}

		@if(Session::has('message'))
				<div class="container">
					<div class="mtop16 alert alert-{{ Session::get('typealert')}}" style ="display:none;">
						{{ Session::get('message')}}	
						@if ($errors -> any())
						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error}}</li>
							@endforeach
						</ul>
						@endif
						<script>
							$('.alert').slideDown();
							setTimeout(function(){ $('.alert').slideUp(); }, 10000);
						</script>

					</div>
					
				</div>
		@endif



	    <div class="footer mtop16">
	    	<a href="{{ url('/ingreso')}}">Ya tengo una cuenta</a>
	    	
	    </div>

	</div>
</div>
@stop
