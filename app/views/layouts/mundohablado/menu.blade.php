<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">.::MundoHablado::.</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('newmh')? 'active' : '' }}"><a href="{{ url('newmh') }}">Inicio</a></li>
            @if(Auth::check() && Auth::user()->role->name == 'miembro')
            <li class="{{ Request::is('newmh/user')? 'active' : '' }}"><a href="{{ url('newmh/user') }}">Miembro</a></li>
            @endif
            @if(Auth::check() && Auth::user()->role->name == 'afiliado')
            <li class="{{ Request::is('newmh/affiliate')? 'active' : '' }}"><a href="{{ url('newmh/affiliate') }}">Asociado</a></li>
            @endif
          </ul>
          @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </div>