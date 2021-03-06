@if(kvfj(Auth::user()->permisos,'vehiculos_ver'))
{!! Form::open([ 'url' => '/admin/vehiculos/'.$p->sigla.'/ver/requerimiento', 'method' => 'POST']) !!}
<div class="row">
	<div class="col-md-4">
		<label for="fecha">Fecha:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::date('fecha',null, ['class' => 'form-control'])!!}
		</div>
	</div>
	<div class="col-md-8">
		<label for="requerimiento">Requerimiento:</label>
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
			{!! Form::text('requerimiento',null, ['class' => 'form-control text-uppercase']) !!}
		</div>
	</div>
</div>
<div class="row mtop16">
	<div class="col-md-12">
		<label for="observacion">Observación:</label>
		<div class="input-group">
			{!! Form::textarea('observacion', null, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
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
		<td>Requerimiento</td>	
		<td>Observación</td>
		<td></td>
	</tr>
</thead>
<tbody class="overflow-scroll">
	@foreach($p->getrequerimiento as $r)
	<tr>
		<td width="120">{{$r->fecha}}</td>	
		<td width="150">{{$r->requerimiento}}</td>
		<td>{{$r->observacion}}</td>
		<td width="120">
			<div class="opts">
							 			
				<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#requerimiento{{$r->id}}{{$p->sigla}}"><i class="fas fa-edit"></i></a>
				
				<div class="modal fade" id="requerimiento{{$r->id}}{{$p->sigla}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				    <div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Requerimiento</strong></h5>
					        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					        </div>

					        <div class="modal-body">
					        {!! Form::open([ 'url' => 'admin/vehiculosverR/'.$p->sigla.'/editar/'.$r->id, 'method' => 'POST']) !!}
							<div class="row">
								<div class="col-md-6">
									<label for="fecha">Fecha:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::date('fecha',$r->fecha, ['class' => 'form-control'])!!}
									</div>
								</div>
							</div>
							<div class="row mtop16">
								<div class="col-md-12">
									<label for="requerimiento">Requerimiento:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
										{!! Form::text('requerimiento',$r->requerimiento, ['class' => 'form-control text-uppercase']) !!}
									</div>
								</div>
							</div>
							<div class="row mtop16">
								<div class="col-md-12">
									<label for="observacion">Observación:</label>
									<div class="input-group">
										{!! Form::textarea('observacion', $r->observacion, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
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

				<a href="#" data-object="{{$r->id}}" data-path="admin/vehiculosverR" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

			</div>

		</td>
	</tr>
	@endforeach

</tbody>
</table>