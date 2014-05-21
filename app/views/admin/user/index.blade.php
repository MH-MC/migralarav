@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Usuarios Miembros</h1>
	@if (Session::has('message'))
		<div class="alert alert-{{Session::get('type')}} fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	<div class="col-lg-2">
		<a href="{{url('admin/user/create')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Crear Usuario</a>
	</div>
	
	<div class="col-lg-3">
		{{ Form::open(array('url' => 'search/'.Crypt::encrypt(Utils::$USER).'/'.Crypt::encrypt(Utils::$MEMBER_ALL), 'role' => 'form', 'method' => 'GET', 'id' => 'search-form')) }}
		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-search"></span>
			<input type="text" class="form-control" placeholder="Buscar" name="query_string">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Filtros <span class="caret"></span></button>
				<ul class="dropdown-menu pull-right">
					<li><a class="filter" href="javascript:void(0)" data-url="{{ url('search/'.Crypt::encrypt(Utils::$USER).'/'.Crypt::encrypt(Utils::$MEMBER_ALL)) }}">Todo</a></li>
					<li><a class="filter" href="javascript:void(0)" data-url="{{ url('search/'.Crypt::encrypt(Utils::$USER).'/'.Crypt::encrypt(Utils::$MEMBER_NAME)) }}">Por Nombre</a></li>
					<li><a class="filter" href="javascript:void(0)" data-url="{{ url('search/'.Crypt::encrypt(Utils::$USER).'/'.Crypt::encrypt(Utils::$MEMBER_USERNAME)) }}">Por Username</a></li>
					<li><a class="filter" href="javascript:void(0)" data-url="{{ url('search/'.Crypt::encrypt(Utils::$USER).'/'.Crypt::encrypt(Utils::$MEMBER_EMAIL)) }}">Por email</a></li>
				</ul>
			</div>
	    </div>
		{{ Form::close() }}
	</div>
	
	<br/><br/>
	<table class="table table-hover table-condensed">
		<thead >
			<th>Username</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>E-mail</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			
			@foreach($users as $user)
				<?php $idEncoded = Utils::encode_id($user->id, array($user->username, $user->email)); ?>
				<tr data-id="{{ $idEncoded }}" data-username="{{ $user->username }}" data-name="{{ $user->firstname.' '.$user->lastname }}">
					<td><a href="{{url('admin/user/'.$idEncoded)}}">{{ $user->username }}</a></td>
					<td>{{ $user->firstname }}</td>
					<td>{{ $user->lastname }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->cellphone }}</td>
					<td>
						<a href="{{url('admin/user/'.$idEncoded.'/edit')}}"><span class="glyphicon glyphicon-cog" title="Editar Usuario"></span></a>&nbsp;
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
  	
	{{ $users->links() }}
</div>

@include('admin.user.modals')

@stop