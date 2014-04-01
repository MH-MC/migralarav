@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">{{ $user->firstname." ".$user->lastname }}</h1>
	@if (Session::has('message'))
    	<div class="alert alert-success fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-1 control-label">Categoría </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $user->role->name }}</span>
		</div>
		<div class="form-group">
			<label class="col-sm-1 control-label">E-mail </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $user->email }}</span>
		</div>
		<div class="form-group">
			<label class="col-sm-1 control-label">Sexo </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $user->sex == 'M'? "Masculino" : "Femenino" }}</span>
		</div>
		<div class="form-group">
			<label class="col-sm-1 control-label">Estatus </label>
			<span class="control-label col-sm-3" style="text-align: left">{{ $user->status == 1? "Activo" : "Inactivo" }}</span>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				<a href="{{url('admin/adminuser')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
				<a href="{{url('admin/adminuser/'.Utils::encode_id($user->id, array($user->username, $user->email)).'/edit')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Editar</a>
			</div>
		</div>
	</form>

</div>

@stop