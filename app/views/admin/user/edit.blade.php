@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Editando Usuario</h1>

	@if (Session::has('errors'))
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Posee errores en el formulario.
		</div>
	@endif
	@if (Session::has('message'))
		<div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ Session::get('message') }}
		</div>
	@endif

	{{ Form::open(array('url' => 'admin/user/'.Utils::encode_id($user->id, array($user->username, $user->email)), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}

		<div class="form-group">
			<div class="{{ $errors->has('firstname')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="firstname" class="col-sm-2 control-label">Nombres (*)</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" value="{{ Input::old('firstname')? Input::old('firstname') : $user->firstname }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('firstname'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('lastname')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="lastname" class="col-sm-2 control-label">Apellidos (*)</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value="{{ Input::old('lastname')? Input::old('lastname') : $user->lastname }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('lastname'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('email')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="email" class="col-sm-2 control-label">E-mail (*)</label>
				<div class="col-sm-3">
					<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ Input::old('email')? Input::old('email') : $user->email }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('email'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('phone')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="phone" class="col-sm-2 control-label">Teléfono</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{ Input::old('phone')? Input::old('phone') : $user->phone }}" maxlength="45">
					<span class="control-label">{{ $errors->first('phone'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('cellphone')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="cellphone" class="col-sm-2 control-label">Celular</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular" value="{{ Input::old('cellphone')? Input::old('cellphone') : $user->cellphone }}" maxlength="45">
					<span class="control-label">{{ $errors->first('cellphone'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-3">
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="sex" value="F" {{ $user->sex == 'F'? "checked": ""}}> F
				</label>
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="sex" value="M" {{ $user->sex == 'M'? "checked": ""}}> M
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<span>(*) Requerido</span>
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