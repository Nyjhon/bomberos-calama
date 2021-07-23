
{!! Form::open([ 'url' => '/admin/personal/'.$p->ci.'/reconocimiento', 'method' => 'POST' ]) !!}
	<div class="row g-3">
		<div class="col-md-3">
			<label for="fecha">Fecha:</label>
	    	{!! Form::date('fecha',null, ['class' => 'form-control','aria-label' => 'dato1'])!!}
	    </div>
	    <div class="col">
	    	<label for="institucion"></label>
	    	{!! Form::text('institucion', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN', 'aria-label' => 'dato1']) !!}
	    </div>
	    <div class="col">
	    	<label for="merito"></label>
	    	{!! Form::text('merito', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'MÉRITO', 'aria-label' => 'dato2']) !!}
	    </div>
	</div>
	<div class="row g-3 mtop8">
		<div class="col-md-12">
			<label for="detalle">Detalle:</label>
			<div class="input-group">
				{!! Form::textarea('detalle', null, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
			</div>
		</div>
	</div>
	<div class="row mtop16">
		<div class="col-md-3">
			{!! Form::submit('Añadir', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}
<table class="table table-striped table-hover mtop16">
	<thead class="table-dark">
		<tr>
			<td>Fecha</td>
			<td>Institución</td>
			<td>Mérito</td>
			<td>Detalle</td>
			<td></td>
		</tr>
	</thead>
	<tbody class="overflow-scroll">
		@foreach($p->getreconocimiento as $r)
		<tr>
			<td width="100">{{$r->fecha}}</td>
			<td width="150">{{$r->institucion}}</td>
			<td width="150">{{$r->merito}}</td>
			<td width="300">{{$r->detalle}}</td>
			<td width="120">
				<div class="opts">
							 			
				<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#reconocimiento{{$r->id}}{{$p->ci}}"><i class="fas fa-edit"></i></a>
				
				<div class="modal fade" id="reconocimiento{{$r->id}}{{$p->ci}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				    <div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Reconocimiento</strong></h5>
					        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					        </div>

					        <div class="modal-body">
					        {!! Form::open([ 'url' => 'admin/personalverR/'.$p->ci.'/editar/'.$r->id, 'method' => 'POST']) !!}
							<div class="row g-3">
								<div class="col">
									<label for="fecha">Fecha:</label>
							    	{!! Form::date('fecha', $r->fecha, ['class' => 'form-control','aria-label' => 'dato1'])!!}
							    </div>
							    <div class="col">
							    	<label for="institucion"></label>
							    	{!! Form::text('institucion', $r->institucion ,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN', 'aria-label' => 'dato1']) !!}
							    </div>
							</div>
							<div class="row g-3 mtop8">
							    <div class="col">
							    	<label for="merito"></label>
							    	{!! Form::text('merito', $r->merito ,['class' => 'form-control text-uppercase', 'placeholder' => 'MÉRITO', 'aria-label' => 'dato2']) !!}
							    </div>
							</div>
							<div class="row g-3 mtop8">
								<div class="col-md-12">
									<label for="detalle">Detalle:</label>
									<div class="input-group">
										{!! Form::textarea('detalle', $r->detalle, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
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

				<a href="#" data-object="{{$r->id}}" data-path="admin/personalverR" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


