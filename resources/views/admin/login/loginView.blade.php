<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <base href="{{ asset('/') }}">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  {{-- <link href="vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"> --}}
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        {!! Form::open(['route' => 'admin.login', 'method' => 'post']) !!}
          <div class="form-group">
            {{ Form::label('email', 'Email Or Phone') }}</label>
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email or Phone']) }}
          </div>
          <div class="form-group">
            {{ Form::label('password', 'Password') }}</label>
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) }}
          </div>
          @if(Session::has('error'))
          <div class="form-group">
            <span class="alert alert-danger p-15 d-block">{{ Session::get('error') }}</span>
          </div>
          @endif
       {{--    <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div> --}}
          {{ Form::submit('Login', ['class' => 'btn btn-success']) }}
        {!! Form::close() !!}
{{--         <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
