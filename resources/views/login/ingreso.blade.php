@extends('login.maestro')

@section('titulo','Ingreso')

@section('content')
<div class="box box_ingreso shadow">

	<div class="header">
			<a href="{{ url('/')}}">
				<img src="{{ url('/static/imagenes/icono.png')}}">
			</a>
		</div>
	<div class="inside">
		{!! Form::open(['url' => '/ingreso']) !!}
	    <label for="email">Correo Electrónico:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-envelope-open-text"></i></div>
	    	</div>
	    	{!! Form::email('email', null, ['class'=>'form-control'])!!}
		</div>

		<label for="password" class="mtop16">Contraseña:</label>
		<div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-key"></i></div>
	    	</div>
	   		{!! Form::password('password', ['class'=>'form-control'])!!}
		</div>
			{!! Form::submit('Ingresar',['class'=>'btn btn-primary mtop16'])!!}
	    {!! Form::close() !!}

		@if(Session::has('message'))
				<div class="container">
					<div class="alert alert-{{ Session::get('typealert')}}" style ="display:none; margin-top: 16px">
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
	    	<a href="{{ url('/registro')}}">Crear cuenta</a>
	    	<a href="{{ url('/recuperar')}}">Recuperar contraseña</a>
	    </div>

	</div>
</div>
@stop
