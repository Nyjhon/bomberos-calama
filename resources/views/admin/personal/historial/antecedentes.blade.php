
	<div class="row mtop8">
		<div class="col-md-6">
			{!! Form::open([ 'url' => '/admin/personal/'.$p->ci.'/atenuante', 'method' => 'POST']) !!}
				<label for="fecha">Fecha:</label>
	    		{!! Form::date('fecha',null, ['class' => 'form-control','aria-label' => 'dato1'])!!}

				<label class="mtop8" for="agrabantes">Atenuantes:</label>
				<div class="input-group">
					{!! Form::textarea('texto', null, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
				</div>
				{!! Form::submit('Añadir', ['class' => 'btn btn-primary mtop8']) !!}
			{!! Form::close() !!}
		</div>
		<div class="col-md-6">
			{!! Form::open([ 'url' => '/admin/personal/'.$p->ci.'/agravante', 'method' => 'POST']) !!}
				<label for="fecha">Fecha:</label>
	    		{!! Form::date('fecha',null, ['class' => 'form-control','aria-label' => 'dato1'])!!}
				<label class="mtop8" for="agrabantes">Agravantes:</label>
				<div class="input-group">
					{!! Form::textarea('texto', null, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
				</div>
				{!! Form::submit('Añadir', ['class' => 'btn btn-primary mtop8']) !!}
			{!! Form::close() !!}
		</div>
	</div>

<div class="row mtop16">
	<div class="col-md-6">
		<table class="table table-striped table-hover mtop16">
			<thead class="table-dark">
				<tr>
					<td>Fecha</td>
					<td>Atenuante</td>
					<td></td>
				</tr>
			</thead>
			<tbody class="overflow-scroll">
				@foreach($p->getatenuante as $at)
				<tr>
					<td>{{$at->fecha}}</td>
					<td>{{$at->atenuante}}</td>
					<td width="120">
						<div class="opts">
									 			
						<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#atenuante{{$at->id}}{{$p->ci}}"><i class="fas fa-edit"></i></a>
						
						<div class="modal fade" id="atenuante{{$at->id}}{{$p->ci}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						    <div class="modal-dialog">
							    <div class="modal-content">
							        <div class="modal-header">
							        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Antecedente</strong></h5>
							        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							        </div>

							        <div class="modal-body">
							        {!! Form::open([ 'url' => 'admin/personalverAT/'.$p->ci.'/editar/'.$at->id, 'method' => 'POST']) !!}
										<label for="fecha">Fecha:</label>
							    		{!! Form::date('fecha', $at->fecha, ['class' => 'form-control','aria-label' => 'dato1'])!!}
										<label class="mtop8" for="agrabantes">Atenuantes:</label>
										<div class="input-group">
											{!! Form::textarea('texto', $at->atenuante, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
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

						<a href="#" data-object="{{$at->id}}" data-path="admin/personalverAT" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table table-striped table-hover mtop16">
			<thead class="table-dark">
				<tr>
					<td>Fecha</td>
					<td>Agrabante</td>
					<td></td>
				</tr>
			</thead>
			<tbody class="overflow-scroll">
				@foreach($p->getagravante as $ag)
				<tr>
					<td>{{$ag->fecha}}</td>
					<td>{{$ag->agravante}}</td>
					<td width="120">
						<div class="opts">
									 			
						<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#agravante{{$ag->id}}{{$p->ci}}"><i class="fas fa-edit"></i></a>
						
						<div class="modal fade" id="agravante{{$ag->id}}{{$p->ci}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						    <div class="modal-dialog">
							    <div class="modal-content">
							        <div class="modal-header">
							        	<h5 class="modal-title" id="staticBackdropLabel"><strong>Editar Curso</strong></h5>
							        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							        </div>

							        <div class="modal-body">
							        {!! Form::open([ 'url' => 'admin/personalverAG/'.$p->ci.'/editar/'.$ag->id, 'method' => 'POST']) !!}
										<label for="fecha">Fecha:</label>
							    		{!! Form::date('fecha', $ag->fecha, ['class' => 'form-control','aria-label' => 'dato1'])!!}

										<label class="mtop8" for="agrabantes">Agravantes:</label>
										<div class="input-group">
											{!! Form::textarea('texto', $ag->agravante, ['class' => 'form-control text-uppercase', 'rows' => '3']) !!}
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

						<a href="#" data-object="{{$ag->id}}" data-path="admin/personalverAG" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a>

						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



