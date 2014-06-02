@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Administradores</h1>
	@if (Session::has('message'))
		<div class="alert alert-{{Session::get('type')}} fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	<div class="col-lg-2">
		<a href="{{url('admin/adminuser')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
	</div>
	<br><br>
	@if(sizeof($records) > 0)
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
			
			@foreach($records as $user)
				<?php $idEncoded = Utils::encode_id($user->id, array($user->username, $user->email)); ?>
				<tr data-id="{{ $idEncoded }}" data-username="{{ $user->username }}" data-name="{{ $user->firstname.' '.$user->lastname }}">
					<td><a href="{{url('admin/adminuser/'.$idEncoded)}}">{{ $user->username }}</a></td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->firstname }}</td>
					<td>{{ $user->lastname }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<a href="{{url('admin/adminuser/'.$idEncoded.'/edit')}}"><span class="glyphicon glyphicon-cog" title="Editar Usuario"></span></a>&nbsp;
						<a href="javascript:void()" class="text-danger confirm-delete" data-toggle="modal" data-target="#delete-user"><span class="glyphicon glyphicon-trash" title="Eliminar Usuario"></span></a>&nbsp;
						@if($user->active == 1)
						<a href="javascript:void()" class="text-danger confirm-down" data-toggle="modal" data-target="#down-user"><span class="glyphicon glyphicon-arrow-down" title="Dar de Baja"></span></a>&nbsp;
						@else
						<a href="javascript:void()" class="text-success confirm-up" data-toggle="modal" data-target="#up-user"><span class="glyphicon glyphicon-arrow-up" title="Dar de Alta"></span></a>&nbsp;
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	{{ $records->appends(array('query_string' => $query_string, '_view' =>Crypt::encrypt('admin.admin.results')))->links() }}
	@else
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<span>No se encontró ningún miembro que coincida con los parámetros de búsqueda <b>{{$query_string}}</b>.</span>
		</div>
	</div>
	@endif
</div>

@include('admin.admin.modals')

@stop