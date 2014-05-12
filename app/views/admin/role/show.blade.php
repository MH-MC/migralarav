@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">{{ $role->name }}</h1>
	@if (Session::has('message'))
    	<div class="alert alert-success fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-1 control-label">Nombre </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $role->name }}</span>
		</div>
		<div class="form-group">
			<label class="col-sm-1 control-label">Rol Padre </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $role->role_id }}</span>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				<a href="{{url('admin/role')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
				<a href="{{url('admin/role/'.Utils::encode_id($role->id, array($role->name, $role->role_id)).'/edit')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Editar</a>
			</div>
		</div>
	</form>

</div>

@stop