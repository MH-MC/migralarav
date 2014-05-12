@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Editando Rol</h1>

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

	{{ Form::open(array('url' => 'admin/role/'.Utils::encode_id($role->id, array($role->name, $role->role_id)), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}

		<div class="form-group">
			<div class="{{ $errors->has('name')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="name" class="col-sm-2 control-label">Nombre (*)</label>
				<div class="col-sm-3">
					<input type="text" class="field form-control" id="name" name="name" placeholder="Nombres" value="{{ Input::old('name')? Input::old('name') : $role->name }}" maxlength="45" required>
					<span class="control-label">{{ $errors->first('name'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('role_id')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="role_id" class="col-sm-2 control-label">Rol </label>
				<div class="col-sm-3">
					<select name="role_id" class="field form-control">
						<option value="">-- Seleccione --</option>
						@foreach ($roles as $_role)
							@if($_role->id != $role->id)
							<option value="{{ Utils::encode_id($_role->id, array($_role->name, $_role->role_id)) }}" {{ $role->role_id == $_role->id? "selected" : "" }} > {{ $_role->name }}</option>
							@endif
						@endforeach
					</select>
					<span class="control-label">{{ $errors->first('role_id'); }}</span>
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
				<a href="{{url('admin/role')}}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</a>
			</div>
		</div>

	{{ Form::close() }}

</div>

@stop