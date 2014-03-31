<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('admin/home') }}">Administración .::MundoHablado::.</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('admin/adminuser/'.Utils::encode_id(Auth::user()->id, array(Auth::user()->username, Auth::user()->email))) }}"><span class="glyphicon glyphicon-user"></span> Perfil [superadmin]</a></li>
        <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</div>
