<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.includes.head')
  @yield('css')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.includes.menu')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        @if(Session::has('notify'))
        <span class="alert-success p-15">{{ Session::get('notify') }}</span>
        @endif
        @if(Session::has('error'))
        <span class="alert-danger p-15">{{ Session::get('error') }}</span>
        @endif
        @yield('content')
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('admin.includes.footer')
    @include('admin.includes.script')
    <script type="text/javascript" src="admin/js/default.js"></script>
    @yield('script')
  </div>
</body>

</html>
