@include('layouts.header')
    @include('layouts.navbar')
    <div class="container-fluid">
      <div class="row">
        @include('layouts.sidemenu')
        @yield('content')
      </div>
    </div>
@include('layouts.footer')
