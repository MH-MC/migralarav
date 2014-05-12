<div class="modal fade" id="delete-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			{{ Form::open(array('url' => 'admin/role/', 'method' => 'delete', 'id'=>'form-delete')) }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					Eliminar Rol
				</div>
				<div class="modal-body">
					<p>¿Está seguro que desea eliminar este rol?</p>
					<label for="" class="label-inline">Nombre de Rol: </label>
					<span class="form-control-static nameToDelete"></span><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					{{Form::hidden('id_toDelete','',array('name'=>'id_toDelete'))}}
					{{Form::hidden('url_base', url('admin/role/'))}}
					{{Form::submit('Eliminar Rol',array('class'=>'btn btn-danger btn-sm'))}}
				</div>
			{{ Form::close() }}
		</div>
 	</div>
</div>
