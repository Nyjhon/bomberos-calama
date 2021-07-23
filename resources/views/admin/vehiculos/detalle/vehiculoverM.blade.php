@if(kvfj(Auth::user()->permisos,'vehiculos_ver'))
{!! Form::open([ 'url' => '/admin/vehiculos/'.$p->sigla.'/ver/mantenimiento', 'method' => 'POST']) !!}
<div class="row">
	<div class="col-md-4">
		<label for="fecha">Fecha:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::date('fecha',null, ['class' => 'form-control'])!!}
		</div>
	</div>
	<div class="col-md-4">
		<label for="pieza">Pieza:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::text('pieza',null, ['class' => 'form-control text-uppercase']) !!}
		</div>
	</div>
</div>
<div class="row mtop16">
	<div class="col-md-12">
		<label for="detalle">Detalle:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::text('detalle',null, ['class' => 'form-control text-uppercase']) !!}
		</div>
	</div>
</div>
<div class="row mtop16">
	<div class="col-md-4">
		<label for="nombre">Nombre:</label>
		<div class="input-group">
				<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::text('nombre',null, ['class' => 'form-control text-uppercase']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<label for="observacion">Observación:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::text('observacion',null, ['class' => 'form-control text-uppercase']) !!}
		</div>
	</div>
</div>
<div class="row mtop16">
	<div class="col-md-3">
		{!! Form::submit('Añadir', ['class' => 'btn btn-primary']) !!}
	</div>
</div>
{!! Form::close() !!}
@endif
<table class="table table-striped table-hover mtop16">
<thead class="table-dark">
	<tr>
		<td>Fecha</td>
		<td>Pieza</td>	
		<td>Detalle</td>
		<td>Nombre</td>
		<td>Observación</td>
		<td></td>
	</tr>
</thead>
<tbody class="overflow-scroll">
	@foreach($p->getmantenimiento as $m)
	<tr>
		<td>{{$m->fecha}}</td>	
		<td>{{$m->pieza}}</td>
		<td>{{$m->detalle}}</td>
		<td>{{$m->nombre}}</td>
		<td>{{$m->observacion}}</td>
		<td width="120">
			<div class="opts">
							 			
				<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#mantenimiento{{$m->id}}{{$p->sigla}}"><i class="fas fa-edit"></i></a>
				
				<div class="modal fade" id="mantenimiento{{$m->id}}{{$p->sigla}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				    <div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Mantenimiento</strong></h5>
					        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					        </div>

					        <div class="modal-body">
					        {!! Form::open([ 'url' => 'admin/vehiculosverM/'.$p->sigla.'/editar/'.$m->id, 'method' => 'POST']) !!}
							<div class="row">
								<div class="col-md-6">
									<label for="fecha">Fecha:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::date('fecha',$m->fecha, ['class' => 'form-control'])!!}
									</div>
								</div>
								<div class="col-md-6">
									<label for="pieza">Pieza:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('pieza',$m->pieza, ['class' => 'form-control text-uppercase']) !!}
									</div>
								</div>
							</div>
							<div class="row mtop16">
								<div class="col-md-12">
									<label for="detalle">Detalle:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('detalle',$m->detalle, ['class' => 'form-control text-uppercase']) !!}
									</div>
								</div>
							</div>
							<div class="row mtop16">
								<div class="col-md-6">
									<label for="nombre">Nombre:</label>
									<div class="input-group">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('nombre',$m->nombre, ['class' => 'form-control text-uppercase']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<label for="observacion">Observación:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('observacion',$m->observacion, ['class' => 'form-control text-uppercase']) !!}
									</div>
								</div>
							</div>
							<div class="row mtop16">
								<div class="col-md-3">
									{!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>
							{!! Form::close() !!}
					        </div>

					        <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					        </div>
					    </div>
				    </div>
				</div>

				<a href="#" data-object="{{$m->id}}" data-path="admin/vehiculosverM" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

			</div>

		</td>
	</tr>
	@endforeach

</tbody>
</table>