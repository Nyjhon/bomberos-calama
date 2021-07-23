@extends('admin.maestro')
@section('title','Inicio')
@section('contenido')
<div class="container-fluid">
	@if(kvfj(Auth::user()->permisos,'dashboard_ver_estadisticas'))
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-chart-bar"></i> Estadísticas</h2>
		</div>
	</div>	

	<div class="row mtop16">
		@if(kvfj(Auth::user()->permisos,'usuarios'))
		<div class="col-md-4 mb16">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-user-friends"></i> Usuarios Registrados</h2>
				</div>
				<div class="inside">
					<div class="big_count"><h5>Total Usuarios:</h5> {{$users}}</div>
						<dl class="row big_count1">
							<dt class="col-sm-6">Varones</dt>
					    	<dd class="col-sm-6">{{$users1}}</dd>

							<dt class="col-sm-6">Mujeres</dt>
					    	<dd class="col-sm-6">{{$users2}}</dd>

							<dt class="col-sm-6">Sin especificar</dt>
					    	<dd class="col-sm-6">{{$users3}}</dd>
						</dl>
					<canvas id="myGraficoUser" width="400" height="400">
					</canvas>
				</div>
			</div>
		</div>
		@endif

		@if(kvfj(Auth::user()->permisos,'activos'))
		<div class="col-md-4 mb16">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-boxes"></i> Activos Registrados</h2>
				</div>
				<div class="inside">
					<div class="big_count"><h5>Total Activos:</h5> {{$activo}}</div>
						<dl class="row big_count1">
							<dt class="col-sm-6">Bueno</dt>
					    	<dd class="col-sm-6">{{$activo1}}</dd>

							<dt class="col-sm-6">Regular</dt>
					    	<dd class="col-sm-6">{{$activo2}}</dd>

							<dt class="col-sm-6">Malo</dt>
					    	<dd class="col-sm-6">{{$activo3}}</dd>

					    	<dt class="col-sm-6">En desuso</dt>
					    	<dd class="col-sm-6">{{$activo4}}</dd>
						</dl>
					<canvas id="myGraficoActivo" width="400" height="400">
					</canvas>
				</div>
			</div>
		</div>
		@endif

		@if(kvfj(Auth::user()->permisos,'personal'))
		<div class="col-md-4 mb16">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-user-tie"></i> Personal Registrados</h2>
				</div>
				<div class="inside">
					<div class="big_count"><h5>Total Personal:</h5> {{$personal}}</div>
					<dl class="row big_count1">
						<dt class="col-sm-6">Varones</dt>
				    	<dd class="col-sm-6">{{$personal1}}</dd>

						<dt class="col-sm-6">Mujeres</dt>
				    	<dd class="col-sm-6">{{$personal2}}</dd>
					</dl>
					<canvas id="myGraficoPersonal" width="400" height="400">
					</canvas>
				</div>
			</div>
		</div>
		@endif

		@if(kvfj(Auth::user()->permisos,'vehiculos'))
		<div class="col-md-4 mb16">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-truck-pickup"></i> Vehículos Registrados</h2>
				</div>
				<div class="inside">
					<div class="big_count"><h5>Total Vehículos:</h5> {{$vehiculo}}</div>
						<dl class="row big_count1">
							<dt class="col-sm-6">Bueno</dt>
					    	<dd class="col-sm-6">{{$vehiculo1}}</dd>

							<dt class="col-sm-6">Regular</dt>
					    	<dd class="col-sm-6">{{$vehiculo2}}</dd>

							<dt class="col-sm-6">Malo</dt>
					    	<dd class="col-sm-6">{{$vehiculo3}}</dd>

					    	<dt class="col-sm-6">En desuso</dt>
					    	<dd class="col-sm-6">{{$vehiculo4}}</dd>
						</dl>
					<canvas id="myGraficoVehiculo" width="400" height="400">
					</canvas>
				</div>
			</div>
		</div>
		@endif

		@if(kvfj(Auth::user()->permisos,'casos'))
		<div class="col-md-4">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-exclamation-triangle"></i> Estadística de Casos</h2>
				</div>
				<div class="inside">
					{!! Form::open(['url'=>'/admin/casos'])!!}
					<div class="row">
						<div class="col-md-12">
						<label for="formulario">Escoge el Formulario:</label>
							<div class="input-group">
			    				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
			    					</span>
								{!! Form::select('formulario', getFormulariosArray(), 1, ['class' => 'form-select']) !!}
							</div>
						</div>
					</div>
					<div class="row mtop16">	
						<div class="col-md-6">
							<div class="input-group">
								{!! Form::number('año', \Carbon\Carbon::now()->year, ['class' => 'form-control','placeholder' => 'AÑO', 'required', 'min' => 0]) !!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
							   	<input name= "enero"class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
							   	<label class="form-check-label" for="defaultCheck1">ENERO</label>
							</div>
							<div class="form-check">
							  	<input name= "febrero"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">FEBRERO</label>
							</div>
							<div class="form-check">
							  	<input name= "marzo"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">MARZO</label>
							</div>
							<div class="form-check">
							  	<input name= "abril"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">ABRIL</label>
							</div>
							<div class="form-check">
							  	<input name= "mayo"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">MAYO</label>
							</div>
							<div class="form-check">
							  	<input name= "junio"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">JUNIO</label>
							</div>
							<div class="form-check">
							  	<input name= "julio"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">JULIO</label>
							</div>
							<div class="form-check">
							  	<input name= "agosto"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">AGOSTO</label>
							</div>
							<div class="form-check">
							  	<input name= "septiembre"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">SEPTIEMBRE</label>
							</div>
							<div class="form-check">
							  	<input name= "octubre"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">OCTUBRE</label>
							</div>
							<div class="form-check">
							  	<input name= "noviembre"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">NOVIEMBRE</label>
							</div>
							<div class="form-check">
							  	<input name= "diciembre"class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
							  	<label class="form-check-label" for="defaultCheck2">DICIEMBRE</label>
							</div>
						</div>
					</div>
					<div class="row mtop16">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fas fa-file-word"></i> Ver estadísticas en Word</button>
						</div>
					</div>
					{!! Form::close() !!}						
				</div>
			</div>
		</div>
		@endif
	</div>
	@endif
</div>
<script>
var ctx = document.getElementById('myGraficoActivo').getContext('2d');
var myGraficoActivo = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Bueno', 'Regular', 'Malo', 'En desuso'],
        datasets: [{
            label: 'Estadistica por Estado del Activo',
            data: [{{$activo1}}, {{$activo2}}, {{$activo3}}, {{$activo4}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myGraficoUser').getContext('2d');
var myGraficoUser = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Varón', 'Mujer', 'Sin especificar'],
        datasets: [{
            label: 'Estadistica por Genero del Usuario',
            data: [{{$users1}}, {{$users2}}, {{$users3}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myGraficoPersonal').getContext('2d');
var myGraficoPersonal = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Varón', 'Mujer'],
        datasets: [{
            label: 'Estadistica por Genero del personal',
            data: [{{$personal1}}, {{$personal2}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myGraficoVehiculo').getContext('2d');
var myGraficoVehiculo = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Bueno', 'Regular', 'Malo', 'En desuso'],
        datasets: [{
            label: 'Genero del usuario',
            data: [{{$vehiculo1}}, {{$vehiculo2}}, {{$vehiculo3}}, {{$vehiculo4}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    }
});
</script>
@endsection
