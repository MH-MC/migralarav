@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Creando Afiliado</h1>
	@if (Session::has('message'))
    	<p class="form-signin-heading">{{ Session::get('message') }}</p>
    @endif
	{{ Form::open(array('url' => 'admin/affiliate/', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST')) }}
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ Input::old('username') }}" maxlength="25">
			</div>
			<label for="firstname" class="col-sm-2 control-label">Nombre y Apellido (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" value="{{ Input::old('firstname') }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Nombre Empresa (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Nombre Empresa" value="{{ Input::old('company_name') }}" maxlength="50">
			</div>
			<label for="position" class="col-sm-2 control-label">Posición (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="position" name="position" placeholder="Posición" value="{{ Input::old('position') }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail (*)</label>
			<div class="col-sm-3">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ Input::old('email') }}" maxlength="100">
			</div>
			<label for="website" class="col-sm-2 control-label">Website (*)</label>
			<div class="col-sm-3">
				<input type="website" class="form-control" id="website" name="website" placeholder="Website" value="{{ Input::old('website') }}" maxlength="100">
			</div>
		</div>
		<div class="form-group">	
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Dirección (*)</label>
			<div class="col-sm-3">
				<textarea class="form-control" id="address" name="address" placeholder="Dirección" rows="4">{{ Input::old('address') }}</textarea>
			</div>
			<label for="description" class="col-sm-2 control-label">Descripción (*)</label>
			<div class="col-sm-3">
				<textarea class="form-control" id="description" name="description" placeholder="Descripción" rows="4">{{ Input::old('description') }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{ Input::old('phone') }}" maxlength="45">
			</div>
			<label for="cellphone" class="col-sm-2 control-label">Celular</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular" value="{{ Input::old('cellphone') }}" maxlength="45">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				<span>(*) Requerido</span><br>
				<span>Importante: La contraseña será generada automáticamente y será enviada al correo del usuario creado.</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
				<a href="{{url('admin/affiliate')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</a>
			</div>
		</div>
	{{ Form::close() }}

</div>

@stop