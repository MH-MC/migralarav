<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			{{ Form::open(array('url' => 'admin/affiliate/', 'method' => 'delete', 'id'=>'form-delete')) }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					Eliminar Usuario
				</div>
				<div class="modal-body">
					<p>¿Está seguro que desea eliminar este afiliado?</p>
					<label for="" class="label-inline">Nombre de Usuario: </label>
					<span class="form-control-static usernameToDelete"></span><br>
					<label for="" class="label-inline">Nombres y Apellidos: </label>
					<span class="form-control-static nameToDelete"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					{{Form::hidden('id_toDelete','',array('name'=>'id_toDelete'))}}
					{{Form::hidden('url_base', url('admin/affiliate/'))}}
					{{Form::submit('Eliminar',array('class'=>'btn btn-danger btn-sm'))}}
				</div>
			{{ Form::close() }}
		</div>
 	</div>
</div>

<div class="modal fade" id="down-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			{{ Form::open(array('url' => 'admin/affiliate/down', 'method' => 'post', 'id'=>'form-down')) }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					Dar de Baja
				</div>
				<div class="modal-body">
					<p>¿Está seguro que desea deshabilitar este afiliado?</p>
					<label for="" class="label-inline">Nombre de Usuario: </label>
					<span class="form-control-static usernameToDown"></span><br>
					<label for="" class="label-inline">Nombres y Apellidos: </label>
					<span class="form-control-static nameToDown"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					{{Form::hidden('id_toDown','',array('name'=>'id_toDown'))}}
					{{Form::hidden('url_base', url('admin/affiliate/down'))}}
					{{Form::submit('Deshabilitar',array('class'=>'btn btn-warning btn-sm'))}}
				</div>
			{{ Form::close() }}
		</div>
 	</div>
</div>

<div class="modal fade" id="up-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			{{ Form::open(array('url' => 'admin/affiliate/up', 'method' => 'post', 'id'=>'form-up')) }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					Dar de Alta
				</div>
				<div class="modal-body">
					<p>¿Está seguro que desea habilitar este afiliado?</p>
					<label for="" class="label-inline">Nombre de Usuario: </label>
					<span class="form-control-static usernameToUp"></span><br>
					<label for="" class="label-inline">Nombres y Apellidos: </label>
					<span class="form-control-static nameToUp"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					{{Form::hidden('id_toUp','',array('name'=>'id_toUp'))}}
					{{Form::hidden('url_base', url('admin/affiliate/up'))}}
					{{Form::submit('Habilitar',array('class'=>'btn btn-success btn-sm'))}}
				</div>
			{{ Form::close() }}
		</div>
 	</div>
</div>