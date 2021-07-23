@extends('login.maestro')

@section('titulo','Recuperar Contraseña')

@section('content')
<div class="box box_ingreso shadow">

	<div class="header">
			<a href="{{ url('/')}}">
				<img src="{{ url('/static/imagenes/icono.png')}}">
			</a>
		</div>
	<div class="inside">
		{!! Form::open(['url' => '/reset']) !!}
	    <label for="email">Correo de Electrónico:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-envelope-open-text"></i></div>
	    	</div>
	    	{!! Form::email('email', $email, ['class'=>'form-control', 'required'])!!}
		</div>

		<label for="codigo" class="mtop16">Código de recuperación:</label>
	    <div class="input-group">
	    	<div class="input-group-prepend">
	    		<div class="input-group-text"><i class="fas fa-key"></i></div>
	    	</div>
	    	{!! Form::number('codigo', null, ['class'=>'form-control', 'required'])!!}
		</div>


			{!! Form::submit('Cambiar Contraseña',['class'=>'btn btn-primary mtop16'])!!}
	    {!! Form::close() !!}

		@if(Session::has('message'))
				<div class="container">
					<div class="alert alert-{{ Session::get('typealert')}}" style ="display:none;">
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


	    <div class="footer_ingreso mtop16">
	    	<a href="{{ url('/registro')}}">Crear cuenta</a>
	    	<a href="{{ url('/ingreso')}}">Ingresar a mi cuenta</a>
	    </div>

	</div>
</div>
@stop
