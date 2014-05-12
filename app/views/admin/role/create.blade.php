@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Creando Rol</h1>
	@if (Session::has('errors'))
		<div class="alert alert-danger fade in">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      	Posee errores en el formulario.
	    </div>
    @endif
	{{ Form::open(array('url' => 'admin/role/', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST')) }}
		<div class="form-group">
			<div class="{{ $errors->has('name')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="name" class="col-sm-2 control-label">Nombre (*)</label>
				<div class="col-sm-3">
					<input type="text" class="field form-control" id="name" name="name" placeholder="Nombre" value="{{ Input::old('name') }}" maxlength="45" required>
					<span class="control-label">{{ $errors->first('name'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="{{ $errors->has('role_id')? 'has-error' : (Session::has('errors')? 'has-success' : '') }} ">
				<label for="role_id" class="col-sm-2 control-label">Rol Padre </label>
				<div class="col-sm-3">
					<select name="role_id" class="field form-control">
						<option value="">-- Seleccione --</option>
						@foreach ($roles as $role)
							<option value="{{ Utils::encode_id($role->id, array($role->name, $role->role_id)) }}"> {{ $role->name }}</option>
						@endforeach
					</select>
					<span class="control-label">{{ $errors->first('role_id'); }}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-2">
				<span>(*) Requerido</span><br>
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