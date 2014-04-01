@extends('layouts.mundohablado.index')
@section('content')

<div class="starter-template">
	<h1>Hola {{ Auth::user()->firstname }} </h1>
</div>

@stop