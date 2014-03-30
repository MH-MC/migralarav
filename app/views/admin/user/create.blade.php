@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Creando Usuario</h1>
	@if (Session::has('message'))
    	<p class="form-signin-heading">{{ Session::get('message') }}</p>
    @endif
	{{ Form::open(array('url' => 'admin/user/', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST')) }}
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ Input::old('username') }}" maxlength="25">
			</div>
		</div>
		<div class="form-group">
			<label for="firstname" class="col-sm-2 control-label">Nombres (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" value="{{ Input::old('firstname') }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">Apellidos (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value="{{ Input::old('lastname') }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail (*)</label>
			<div class="col-sm-3">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ Input::old('email') }}" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{ Input::old('phone') }}" maxlength="45">
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Celular</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular" value="{{ Input::old('cellphone') }}" maxlength="45">
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-3">
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="sex" value="F" {{ Input::old('sex') == 'F'? "checked": ""}}> F
				</label>
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="sex" value="M" {{ Input::old('sex') == 'M'? "checked": ""}}> M
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<span>(*) Requerido</span><br>
				<span>Importante: La contraseña será generada automáticamente y será enviada al correo del usuario creado.</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
				<a href="{{url('admin/user')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</a>
			</div>
		</div>
	{{ Form::close() }}

</div>

@stop