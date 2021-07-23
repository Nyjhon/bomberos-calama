
{!! Form::open([ 'url' => '/admin/personal/'.$p->ci.'/curso', 'method' => 'POST', 'files' => true ]) !!}
	<div class="row g-3">
	    <div class="col">
	    	{!! Form::text('institucion', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN', 'aria-label' => 'dato1']) !!}
	    </div>
	    <div class="col">
	    	{!! Form::text('area', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'ÁREA DE ESTUDIO', 'aria-label' => 'dato2']) !!}
	    </div>
	</div>
	<div class="row g-3 mtop16">
	    <div class="col">
	    	{!! Form::select('tipo', getTipoPersonalkey(),1 ,['class' => 'form-select text-uppercase', 'aria-label' => 'dato2']) !!}
	    </div>
	    <div class="col">
	    	{!! Form::text('duracion', null ,['class' => 'form-control text-uppercase', 'placeholder' => 'DURACIÓN', 'aria-label' => 'dato2']) !!}
	    </div>
	</div>
	<div class="row g-3 mtop16">
	    <div class="col">
	    	{!! Form::text('detalle',null ,['class' => 'form-control text-uppercase', 'placeholder' => 'DETALLE', 'aria-label' => 'dato2']) !!}
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
			<td>Área de estudio</td>	
			<td>Tipo</td>
			<td>Duración</td>
			<td>Detalle</td>
			<td></td>
		</tr>
	</thead>
	<tbody class="overflow-scroll">
		@foreach($p->getcurso as $m)
		<tr>
			<td width="200">{{$m->institucion}}</td>
			<td width="200">{{$m->area}}</td>
			<td width="120">{{getTipoPersonalkeyArray($m->tipo)}}</td>
			<td width="120">{{$m->horas}}</td>
			<td width="200">{{$m->detalle}}</td>
			<td width="120">
				<div class="opts">
							 			
				<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#curso{{$m->id}}{{$p->ci}}"><i class="fas fa-edit"></i></a>
				
				<div class="modal fade" id="curso{{$m->id}}{{$p->ci}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				    <div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Curso</strong></h5>
					        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					        </div>

					        <div class="modal-body">
					        {!! Form::open([ 'url' => 'admin/personalverC/'.$p->ci.'/editar/'.$m->id, 'method' => 'POST']) !!}
							<div class="row g-3">
							    <div class="col">
							    	{!! Form::text('institucion', $m->institucion,['class' => 'form-control text-uppercase', 'placeholder' => 'INSTITUCIÓN', 'aria-label' => 'dato1']) !!}
							    </div>
							</div>
							<div class="row g-3 mtop8">
								<div class="col">
							    	{!! Form::text('area', $m->area ,['class' => 'form-control text-uppercase', 'placeholder' => 'ÁREA DE ESTUDIO', 'aria-label' => 'dato2']) !!}
							    </div>
							</div>
							<div class="row g-3 mtop8">
							    <div class="col">
							    	{!! Form::select('tipo', getTipoPersonalkey(),$m->tipo ,['class' => 'form-select text-uppercase', 'aria-label' => 'dato2']) !!}
							    </div>
							    <div class="col">
							    	{!! Form::text('duracion', $m->horas ,['class' => 'form-control text-uppercase', 'placeholder' => 'DURACIÓN', 'aria-label' => 'dato2']) !!}
							    </div>
							</div>
							<div class="row g-3 mtop16">
							    <div class="col">
							    	{!! Form::text('detalle',$m->detalle ,['class' => 'form-control text-uppercase', 'placeholder' => 'DETALLE', 'aria-label' => 'dato2']) !!}
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

				<a href="#" data-object="{{$m->id}}" data-path="admin/personalverC" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


