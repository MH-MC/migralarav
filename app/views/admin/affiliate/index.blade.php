@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Afiliados</h1>

	<div class="col-lg-2">
		<a href="{{url('admin/affiliate/create')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Crear Afiliado</a>
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
			<th>Nombre</th>
			<th>E-mail</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			
			@foreach($users as $user)
				<tr>
					<?php $idEncoded = Utils::encode_id($user->id, array($user->username, $user->email)); ?>
					<td><a href="{{url('admin/affiliate/'.$idEncoded)}}">{{ $user->username }}</a></td>
					<td>{{ $user->affiliate->company_name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->cellphone }}</td>
					<td>
						{{ Form::open(array('url' => 'admin/affiliate/'.$idEncoded, 'method' => 'delete')) }}
							<a href="{{url('admin/affiliate/'.$idEncoded.'/edit')}}"><span class="glyphicon glyphicon-cog" title="Editar Usuario"></span></a>&nbsp;
							<a href="javascript:void()" onclick='if(confirm("¿Está seguro que desea eliminar este usuario?")) this.parentNode.submit(); return false;'><span class="glyphicon glyphicon-trash" title="Eliminar Usuario"></span></a>&nbsp;
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