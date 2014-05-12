@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Roles</h1>
	@if (Session::has('message'))
		<div class="alert alert-{{Session::get('type')}} fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	<div class="col-lg-2">
		<a href="{{url('admin/role/create')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Crear Rol</a>
	</div>
	
	<div class="col-lg-3">
		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-search"></span>
			<input type="text" class="form-control" placeholder="Buscar">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Filtros <span class="caret"></span></button>
				<ul class="dropdown-menu pull-right">
					<li><a href="#">Todo</a></li>
					<li><a href="#">Por Nombre</a></li>
				</ul>
			</div>
	    </div>
	</div>
	
	<br/><br/>
	<table class="table table-hover table-condensed">
		<thead >
			<th>Nombre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			
			@foreach($roles as $role)
				<?php $idEncoded = Utils::encode_id($role->id, array($role->name, $role->role_id)); ?>
				<tr data-id="{{ $idEncoded }}" data-name="{{ $role->name }}">
					<td><a href="{{url('admin/role/'.$idEncoded)}}">{{ $role->name }}</a></td>
					<td>
						<a href="{{url('admin/role/'.$idEncoded.'/edit')}}"><span class="glyphicon glyphicon-cog" title="Editar Rol"></span></a>&nbsp;
						<a href="javascript:void()" class="text-danger confirm-role-delete" data-toggle="modal" data-target="#delete-role"><span class="glyphicon glyphicon-trash" title="Eliminar Rol"></span></a>&nbsp;
					<!--
						@if($role->active == 1)
						<a href="javascript:void()" class="text-danger confirm-down" data-toggle="modal" data-target="#down-role"><span class="glyphicon glyphicon-arrow-down" title="Dar de Baja"></span></a>&nbsp;
						@else
						<a href="javascript:void()" class="text-success confirm-up" data-toggle="modal" data-target="#up-role"><span class="glyphicon glyphicon-arrow-up" title="Dar de Alta"></span></a>&nbsp;
						@endif
					-->
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	
	{{ $roles->links() }}
</div>

@include('admin.role.modals')

@stop