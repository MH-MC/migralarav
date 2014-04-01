@extends('layouts.mundohablado.index')
@section('content')

<div class="starter-template">
	<h1>Hola {{ Auth::user()->affiliate->company_name }} </h1>
</div>

@stop