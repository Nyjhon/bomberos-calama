<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>@yield('title') - {{Config::get('bomberos.nombre')}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	<link rel="shortcut icon" href="/static/imagenes/icono.png">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	
	<link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/aed06cb06b.js" crossorigin="anonymous"></script>
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- JavaScript Bundle with Popper -->
	<!--<script src="{{ url('/static/librerias/ckeditor/ckeditor.js') }}"></script>-->
	<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "> </script>
	<script src="{{ url('/static/js/mdslider.js') }}"></script>
	<script src="{{ url('/static/js/site.js') }}"></script>



</head>
<body>
	<nav class="navbar navbar-expand-lg shadow">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ url('static/imagenes/icono.png') }}"> </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationMain" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <i class="fas fa-bars"></i>
		    </button>

		    <div class="collapse navbar-collapse flex-row-reverse" id="navigationMain">
		    	<ul class="navbar-nav ">
			        <li class="nav-item">
		    			<a href="{{ url('/') }}" class="nav-link"><i class="fas fa-house-user"></i><span> Inicio</span></a>
		    		</li>
		    		<li class="nav-item">
		    			<a href="#nosotros" class="nav-link"><i class="fas fa-id-card-alt"></i><span> Sobre nosotros</span></a>
		    		</li>
		    		@if(Auth::guest())
		    		<li class="nav-item link-acc">
		    			<a href="{{ url('/ingreso') }}" class="nav-link btn"><i class="fas fa-fingerprint"></i> Iniciar Sesión</a>
		    			<a href="{{ url('/registro') }}" class="nav-link btn"><i class="fas fa-user-circle"></i> Registrarse</a>
		    		</li>
		    		@else
	    			<li class="nav-item link-acc link-user dropdown">
		    			<a href="{{ url('/ingreso') }}" class="nav-link btn dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		    				@if(is_null(Auth::user()->avatar))
		    					<img src="{{url('/imagenes/default-avatar.png')}}">
		    				@else
			    				<img src="{{url('/imagenes/uploads_user/'.Auth::id().'/av_'.Auth::user()->avatar)}}">
		    				@endif 
		    				Hola: {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
		    			</a>
		    			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		    				@if(Auth::user()->role == "1")
		    				<li>
				    			<a class="dropdown-item" href="{{ url('/admin') }}">
				    				<i class="fas fa-cash-register"></i> Sistema de Registro
				    			</a>
				    		</li>
				    		<li><hr class="dropdown-divider"></li>
				    		@endif
		    				<li>
		    					<a class="dropdown-item" href="{{ url('perfil/edit') }}">
		    						<i class="fas fa-address-card"></i> Editar mi perfil
		    					</a>
		    				</li>
		    				<li>
		    					<a class="dropdown-item" href="{{ url('/cerrar') }}">
		    						<i class="fas fa-sign-out-alt"></i>  Cerrar Sesión
		    					</a>
		    				</li>
		    			</ul>
	    			</li>
		    		@endif
			    </ul>
		    </div>
		</div> 
	</nav>	

	@if(Session::has('message'))
		<div class="container">
		<div class="alert alert-{{ Session::get('typealert')}} mtop16" style ="display:block; margin-top: 75px; position: absolute; z-index: 2;">
			{{ Session::get('message') }}	
			@if ($errors->any())
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
	<div class="wrapper">
		<div class="container">
			@yield('content')
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>