@extends('layouts.mundohablado.index')
@section('content')

<div class="starter-template">
	<h1 class="page-header">Inicie Sesión</h1>
	@if (Session::has('message'))
		<div class="alert alert-danger fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	{{ Session::get('message') }}
	    </div>
    @endif
	{{ Form::open(array('url' => 'login/'.$type, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST')) }}
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username </label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="username" name="username" maxlength="15" required>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password </label>
			<div class="col-sm-3">
				<input type="password" class="form-control" id="password" name="password" maxlength="50" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<button type="submit" class="btn btn-default">Ingresar <span class="glyphicon glyphicon-arrow-right"></span></button>
			</div>
		</div>
	{{ Form::close() }}
</div>

@stop