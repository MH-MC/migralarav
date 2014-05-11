@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Editando Administrador</h1>

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

	{{ Form::open(array('url' => 'admin/adminuser/'.Utils::encode_id($user->id, array($user->username, $user->email)), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}

		<div class="form-group">
			<div class="{{ $errors->has('firstname')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="firstname" class="col-sm-2 control-label">Nombres (*)</label>
				<div class="col-sm-3">
					<input type="text" class="field form-control" id="firstname" name="firstname" placeholder="Nombres" value="{{ Input::old('firstname')? Input::old('firstname') : $user->firstname }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('firstname'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('lastname')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="lastname" class="col-sm-2 control-label">Apellidos (*)</label>
				<div class="col-sm-3">
					<input type="text" class="field form-control" id="lastname" name="lastname" placeholder="Apellidos" value="{{ Input::old('lastname')? Input::old('lastname') : $user->lastname }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('lastname'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('email')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="email" class="col-sm-2 control-label">E-mail (*)</label>
				<div class="col-sm-3">
					<input type="email" class="field form-control" id="email" name="email" placeholder="E-mail" value="{{ Input::old('email')? Input::old('email') : $user->email }}" maxlength="50" required>
					<span class="control-label">{{ $errors->first('email'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-3">
				<label class="radio-inline">
					<input type="radio" class="field form-control" id="sexF" name="sex" value="F" {{ $user->sex == 'F'? "checked": ""}}> F
				</label>
				<label class="radio-inline">
					<input type="radio" class="field form-control" id="sexF" name="sex" value="M" {{ $user->sex == 'M'? "checked": ""}}> M
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('role')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="role" class="col-sm-2 control-label">Rol (*)</label>
				<div class="col-sm-3">
					<select name="role" class="field form-control">
						<option value="">-- Seleccione --</option>
						@foreach ($roles as $role)
							<option value="{{ Utils::encode_id($role->id, array($role->id, $role->name)) }}" {{ $user->role_id == $role->id? "selected" : "" }} > {{ $role->name }}</option>
						@endforeach
					</select>
					<span class="control-label">{{ $errors->first('role'); }}</span>
				</div>
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
				<a href="{{url('admin/adminuser')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</a>
			</div>
		</div>

	{{ Form::close() }}

</div>

@stop