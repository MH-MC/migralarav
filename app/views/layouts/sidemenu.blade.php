<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="dropdown">
        <a href="#submenu1" class="accordion-toggle collapsed" data-toggle="collapse"><span class="glyphicon glyphicon-user"></span> Usuarios <b class="caret"></b></a>
        <ul id="submenu1" class="nav nav-list {{ Request::is('admin/user') || Request::is('admin/user/*') || Request::is('admin/affiliate') || Request::is('admin/affiliate/*') || Request::is('admin/adminuser') || Request::is('admin/adminuser/*')? 'collapse in' : 'collapse' }}">
          <li class="{{ Request::is('admin/user') || Request::is('admin/user/*')? 'active' : '' }}">
            <a href="{{ url('admin/user') }}">Miembros</a>
          </li>
          <li class="{{ Request::is('admin/affiliate') || Request::is('admin/affiliate/*')? 'active' : '' }}">
            <a href="{{ url('admin/affiliate') }}">Afiliados</a>
          </li>
          <li class="{{ Request::is('admin/adminuser') || Request::is('admin/adminuser/*')? 'active' : '' }}">
            <a href="{{ url('admin/adminuser') }}">Administradores</a>
          </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/role') || Request::is('admin/role/*')? 'active' : '' }}">
      <a href="{{ url('admin/role') }}"><span class="glyphicon glyphicon-lock"></span> Roles</a>
    </li>
    <li class="{{ Request::is('admin/author') || Request::is('admin/author/*')? 'active' : '' }}">
      <a href="{{ url('admin/author') }}"><span class="glyphicon glyphicon-pencil"></span> Autores</a>
    </li>
    <li class="{{ Request::is('admin/narrator') || Request::is('admin/narrator/*')? 'active' : '' }}">
      <a href="{{ url('admin/narrator') }}"><span class="glyphicon glyphicon-comment"></span> Narradores</a>
    </li>
    <li class="dropdown">
        <a href="#submenu2" class="accordion-toggle collapsed" data-toggle="collapse"><span class="glyphicon glyphicon-book"></span> Audiolibros <b class="caret"></b></a>
        <ul id="submenu2" class="nav nav-list {{ Request::is('admin/audiobook') || Request::is('admin/audiobook/*') || Request::is('admin/verify_audiobook') || Request::is('admin/verify_audiobook/*')? 'collapse in' : 'collapse' }}">
          <li class="{{ Request::is('admin/audiobook') || Request::is('admin/audiobook/*')? 'active' : '' }}">
            <a href="{{ url('admin/audiobook') }}">Listado</a>
          </li>
          <li class="{{ Request::is('admin/verify_audiobook') || Request::is('admin/verify_audiobook/*')? 'active' : '' }}">
            <a href="{{ url('admin/verify_audiobook') }}">Circuito</a>
          </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#submenu3" class="accordion-toggle collapsed" data-toggle="collapse"><span class="glyphicon glyphicon-list-alt"></span> Contratos <b class="caret"></b></a>
        <ul id="submenu3" class="nav nav-list {{ Request::is('admin/contract') || Request::is('admin/contract/*') || Request::is('admin/contract_model') || Request::is('admin/contract_model/*')? 'collapse in' : 'collapse' }}">
          <li class="{{ Request::is('admin/contract') || Request::is('admin/contract/*')? 'active' : '' }}">
            <a href="{{ url('admin/contract') }}">Listado</a>
          </li>
          <li class="{{ Request::is('admin/contract_model') || Request::is('admin/contract_model/*')? 'active' : '' }}">
            <a href="{{ url('admin/contract_model') }}">Modelos</a>
          </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/banner') || Request::is('admin/banner/*')? 'active' : '' }}">
      <a href="{{ url('admin/banner') }}"><span class="glyphicon glyphicon-film"></span> Banners</a>
    </li>
    <li class="{{ Request::is('admin/public_biblio') || Request::is('admin/public_biblio/*')? 'active' : '' }}">
      <a href="{{ url('admin/public_bilio') }}"><span class="glyphicon glyphicon-globe"></span> Biblioteca Pública</a>
    </li>
    <li class="{{ Request::is('admin/config') || Request::is('admin/config/*')? 'active' : '' }}">
      <a href="{{ url('admin/config') }}"><span class="glyphicon glyphicon-hand-up"></span> Configuraciones Manuales</a>
    </li>
  </ul>
</div>
