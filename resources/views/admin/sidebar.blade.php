<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
		<a href="{{ url('/') }}">	
			<img src="{{ url('static/imagenes/icono.png') }}" class="img-fluid">
		</a>
		</div>
		<div class="user">
			<span class="subtitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
				
			</div>
			<div class="email">
				{{ Auth::user()->email }}
			</div>
				<a href="{{ url('/cerrar') }}" data-toggle="tooltip" data-placement="top" title="Cerrar sección"><i class="fas fa-power-off"></i> Cerrar sesión</a>
		</div>
	</div>

	<div class="main">
		<ul>
			<strong>
			@if(kvfj(Auth::user()->permisos,'dashboard'))
			<li>
				<a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-cash-register"></i>INICIO</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'casos'))
			<li>
				<a href="{{ url('/admin/casos/bomberos') }}" class="lk-casos lk-añadir_caso lk-editar_caso lk-eliminar_caso lk-ver_caso"><i class="fas fa-exclamation-triangle"></i>CASOS</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'personal'))
			<li>
				<a href="{{ url('/admin/personal/4') }}" class="lk-personal lk-personal_add lk-personal_edit lk-personal_eliminar lk-personal_ver lk-personal_buscar"><i class="fas fa-user-tie"></i>PERSONAL</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'activos'))
			<li>
				<a href="{{ url('/admin/activos/5') }}" class="lk-activos lk-activos_add lk-activos_edit lk-activos_eliminar lk-activos_ver lk-activos_buscar"><i class="fas fa-boxes"></i>ACTIVOS FIJOS</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'vehiculos'))
			<li>
				<a href="{{ url('/admin/vehiculos/5') }}" class="lk-vehiculos lk-vehiculos_add lk-vehiculos_edit lk-vehiculos_eliminar lk-vehiculos_ver lk-vehiculos_buscar"><i class="fas fa-truck-pickup"></i>PARQUEO AUTOMOTOR</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'usuarios'))
			<li>
				<a href="{{ url('/admin/usuarios/all') }}" class="lk-usuarios lk-usuarios_edit lk-usuarios_permiso"><i class="fas fa-user-friends"></i>USUARIOS</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permisos,'config'))
			<li>
				<a href="{{ url('/admin/config') }}" class="lk-config"><i class="fas fa-cogs"></i>CONFIGURACIONES</a>
			</li>
			@endif
			</strong>
		</ul>
		
	</div>
</div>