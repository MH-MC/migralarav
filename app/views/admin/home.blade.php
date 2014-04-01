@extends('layouts.admin.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Hola, {{ Auth::user()->firstname." ".Auth::user()->lastname }}</h1>
</div>

@stop

