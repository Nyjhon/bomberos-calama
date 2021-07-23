@extends('Maestro')
@section('title','Página de Inicio')
@section('content')
<div class="mdslider mtop16">
	<ul class="navigation">
		<li><a href="#" id="md_slider_nav_prew"><i class="fas fa-angle-left"></i></a></li>
		<li><a href="#" id="md_slider_nav_next"><i class="fas fa-angle-right"></i></a></li>
	</ul>
	@foreach($slider as $slider)
	<div class="md-slider-item">
		<div class="row">
			<div class="col-md-8">
				<div class="cuadrado-perfecto">
					<img src="{{url('/imagenes/uploads/'.$slider->file_path.'/'.$slider->file_name)}}">
				</div>
			</div>
			<div class="col-md-4">
				<div  class="content">
					<div class="row">
						<h1 class="text-uppercase">{{$slider->nombre}}</h1>
						<h2>{{$slider->contenido}}</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<section id="nosotros">
<div class="datos">
	<div class="container  mtop16 mbot32">
		<div class="panel shadow fondo">
			<div class="row">
				<div class="col-md-6">
					<h2>Misión</h2>
					<p>Prestar servicios de prevención, auxilio y rescate en incendios, inundaciones, derrumbes, desastres naturales, accidentes de tránsito y todo llamado auxilio y socorro, bajo su lema “Ante todo salvar vidas, salvar bienes”.</p>
				</div>
				<div class="col-md-6">
					<h2>Visión</h2>
					<p>Constituirse en una unidad especializada de prevención y auxilio, con personal altamente calificado en técnicas de lucha contra fuego y bomberia, rescate en montaña, rescate acuático, primeros auxilios y manejo de explosivos, contando con vehículos motorizados y equipos adecuados para satisfacer las necesidades de auxilio y socorro de la sociedad, engrandeciendo la imagen institucional.   </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3795.5495684758325!2d-67.10280368567801!3d-17.953150884516102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e2b0a9fc637afd%3A0x28377225a6c50120!2sDirecci%C3%B3n%20Departamental%20de%20Bomberos%20Polic%C3%ADa!5e0!3m2!1ses!2sbo!4v1619056281392!5m2!1ses!2sbo" width="100%" height="300" style=" " allowfullscreen="" loading="lazy" class="maps"></iframe>
				</div>
				<div class="col-md-7">
					<div class="inf">
						<div class="row">
							<div class="col-sm-12">
								<h5>Estamos ubicados en:</h5>
								{{Config::get('bomberos.ubicacion')}}
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-sm-6">
								<h5>Latitud</h5>
								{{Config::get('bomberos.latitud')}}
							</div>
							<div class="col-sm-6">
								<h5>Longitud</h5>
								{{Config::get('bomberos.longitud')}}
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-sm-6">
								<h5>Dimensiones</h5>
								{{Config::get('bomberos.dimension')}}
							</div>
							<div class="col-sm-6">
								<h5>Ambiente</h5>
								{{Config::get('bomberos.detalle')}}
							</div>
						</div>
						<dl class="row mtop16 telefonos">
							<dt class="col-sm-6"><h5>Teléfono Secretaría:</h5></dt>
					    	<dd class="col-sm-6 tel">{{Config::get('bomberos.tel_secretaria')}}</dd>

							<dt class="col-sm-6"><h5>Teléfono Cooporativo:</h5></dt>
					    	<dd class="col-sm-6 tel">{{Config::get('bomberos.tel_cooporativo')}}</dd>

							<dt class="col-sm-6"><h5>Teléfono de Emergencias:</h5></dt>
					    	<dd class="col-sm-6 tel">{{Config::get('bomberos.tel_emergencia')}}</dd>
						</dl>															
							
					</div>
				</div>
			</div>
			<div class="base">
				<div class="row redes mtop8">
					<div class="col-sm-6 sociales">
						<h6>Redes sociales:</h6>
					</div>
					<div class="col-sm-6">
						<a href="https://www.facebook.com/BomberosCalamaOruro" target="_blank">
							<i class="fab fa-facebook-square"></i>
							 Facebook
						</a>
					</div>
				</div>
				<p>Oruro - Bolivia</p>
			</div>
			
		</div>
	</div>
</div>
</section>
@endsection
