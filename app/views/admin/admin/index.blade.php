@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Administradores</h1>

	<div class="col-lg-2">
		<a href="{{url('admin/adminuser/create')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Crear Administrador</a>
	</div>
	
	<div class="col-lg-2">
		<div class="input-group">
	      <input type="text" placeholder="Buscar" class="form-control">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
	      </span>
	    </div><!-- /input-group -->
	</div>
	
	<br/><br/>
	<table class="table table-hover table-condensed">
		<thead >
			<th>Username</th>
			<th>Rol</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>E-mail</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			
			@foreach($users as $user)
				<tr>
					<?php $idEncoded = Utils::encode_id($user->id, array($user->username, $user->email)); ?>
					<td><a href="{{url('admin/adminuser/'.$idEncoded)}}">{{ $user->username }}</a></td>
					<td>{{ $user->role->name }}</td>
					<td>{{ $user->firstname }}</td>
					<td>{{ $user->lastname }}</td>
					<td>{{ $user->email }}</td>
					<td>
						{{ Form::open(array('url' => 'admin/adminuser/'.$idEncoded, 'method' => 'delete')) }}
							<a href="{{url('admin/adminuser/'.$idEncoded.'/edit')}}"><span class="glyphicon glyphicon-cog" title="Editar Usuario"></span></a>&nbsp;
							<a href="javascript:void()" onclick='if(confirm("¿Está seguro que desea eliminar este administrador?")) this.parentNode.submit(); return false;'><span class="glyphicon glyphicon-trash" title="Eliminar Administrador"></span></a>&nbsp;
							<a href="#"><span class="glyphicon glyphicon-arrow-down" title="Dar de Baja"></span></a>&nbsp;
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	
	{{ $users->links() }}
</div>

@stop