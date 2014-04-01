@include('layouts.admin.header')
    @include('layouts.admin.navbar')
    <div class="container-fluid">
      <div class="row">
        @include('layouts.admin.sidemenu')
        @yield('content')
      </div>
    </div>
@include('layouts.admin.footer')
