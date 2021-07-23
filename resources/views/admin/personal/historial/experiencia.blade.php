
{!! Form::open([ 'url' => '/admin/personal/'.$p->ci.'/experiencia', 'method' => 'POST', 'files' => true ]) !!}
	<div class="row g-3">
	    <div class="col">
	    	{!! Form::text('institucion', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN']) !!}
	    </div>
	    <div class="col">
	    	{!! Form::text('cargo', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'CARGO O FUNCIONES DESEMPAÑADAS']) !!}
	    </div>
	</div>
	<div class="row g-3 mtop16">
	    <div class="col">
	    	{!! Form::text('tiempo', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'TIEMPO DE TRABAJO']) !!}
	    </div>
	    <div class="col">
	    	{!! Form::text('referencia',null ,['class' => 'form-control text-uppercase', 'placeholder' => 'REFERENCIA DE TRABAJO']) !!}
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
			<td>Institución</td>
			<td>Cargo</td>	
			<td>Tiempo</td>
			<td>Referencia</td>
			<td>Detalle</td>
			<td></td>
		</tr>
	</thead>
	<tbody class="overflow-scroll">
		@foreach($p->getexperiencia as $e)
		<tr>
			<td width="150">{{$e->institucion}}</td>
			<td width="150">{{$e->cargo}}</td>
			<td width="100">{{$e->tiempo}}</td>
			<td width="120">{{$e->referencia}}</td>
			<td width="200">{{$e->detalle}}</td>
			<td width="120">
				<div class="opts">
							 			
				<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#experiencia{{$e->id}}{{$p->ci}}"><i class="fas fa-edit"></i></a>
				
				<div class="modal fade" id="experiencia{{$e->id}}{{$p->ci}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				    <div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Experiencia</strong></h5>
					        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					        </div>
					        <div class="modal-body">
						        {!! Form::open([ 'url' => 'admin/personalverE/'.$p->ci.'/editar/'.$e->id, 'method' => 'POST']) !!}
								<div class="row">
								    <div class="col">
								    	{!! Form::text('institucion', $e->institucion,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN']) !!}
								    </div>
								</div>
								<div class="row mtop8">
									<div class="col">
								    	{!! Form::text('cargo', $e->cargo ,['class' => 'form-control text-uppercase', 'placeholder' => 'CARGO']) !!}
								    </div>
								</div>
							    <div class="row mtop8">
								    <div class="col">
								    	{!! Form::text('tiempo', $e->tiempo ,['class' => 'form-control text-uppercase', 'placeholder' => 'TIEMPO DE TRABAJO']) !!}
								    </div>
								    <div class="col">
								    	{!! Form::text('referencia',$e->referencia ,['class' => 'form-control text-uppercase', 'placeholder' => 'REFERENCIA', 'aria-label' => 'dato2']) !!}
								    </div>
								</div>							
								<div class="row mtop8">
								    <div class="col">
								    	{!! Form::text('detalle',$e->detalle ,['class' => 'form-control text-uppercase', 'placeholder' => 'DETALLE']) !!}
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

				<a href="#" data-object="{{$e->id}}" data-path="admin/personalverE" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


