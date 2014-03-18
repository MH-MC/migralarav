@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Editando Usuario</h1>
	@if (Session::has('message'))
    	<p class="form-signin-heading">{{ Session::get('message') }}</p>
    @endif
	{{ Form::open(array('url' => 'admin/user/'.$user->id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}
		<div class="form-group">
			<label for="firstname" class="col-sm-2 control-label">Nombres (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" value="{{ $user->firstname }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">Apellidos (*)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value="{{ $user->lastname }}" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail (*)</label>
			<div class="col-sm-3">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $user->email }}" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{ $user->phone }}" maxlength="45">
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Celular</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular" value="{{ $user->cellphone }}" maxlength="45">
			</div>
		</div>
		<div class="form-group">
			<label for="cellphone" class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-3">
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="radioSex" value="F" {{ $user->sex == 'F'? "checked": ""}}> F
				</label>
				<label class="radio-inline">
					<input type="radio" class="form-control" id="sexF" name="radioSex" value="M" {{ $user->sex == 'M'? "checked": ""}}> M
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