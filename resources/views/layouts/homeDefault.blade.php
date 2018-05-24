<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
    @yield('css')
  </head>
  <body>
    @include('includes.menu')
    <div class="container">
      @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.dialog')
    @include('includes.script')
    @include('script.btn-click')
    @yield('script')
  </body>
</html>
