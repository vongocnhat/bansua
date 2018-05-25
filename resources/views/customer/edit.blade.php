@extends('layouts.homeDefault')
@section('content')
@if ($errors->any())
<div class="alert alert-danger p-15">
  <ol class="errors-ol">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ol>
</div>
@endif
<div class="card-header">
  <i class="fa fa-edit"></i> <b>Chỉnh Sửa {{ $user->admin ? 'Admin' : 'User' }}</b>
</div>
<div>
	{!! Form::model($user, ['route' => ['customer.update', $user->id], 'method' => 'put']) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Tên:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Mật Khẩu:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('confirmPassword', 'Xác Nhận Mật Khẩu:') }}
				{{ Form::password('confirmPassword', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Số Điện Thoại:') }}
				{{ Form::number('phone', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Ngày Sinh:') }}
				{{ Form::date('birthday', null, ['class' => 'form-control no-spin']) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'Thành Phố:') }}
				{{ Form::text('city', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Quận:') }}
				{{ Form::text('country', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Địa Chỉ:') }}
				{{ Form::text('address', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Giới Tính:') }}
				<label class="border p-1">Nam {{ Form::radio('gender', 1, null) }}</label>
				<label class="border p-1">Nữ {{ Form::radio('gender', 0, null) }}</label>
			</div>
		</div>
		<div class="form-group col-12">
			{{ Form::submit('Save', ['class' => 'btn btn-success']) }}
			{{ Form::button('Cancel', ['class' => 'btn btn-danger', 'onclick' => 'window.history.back()']) }}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datepicker/css/datepicker.min.css') }}">
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('vendor/datepicker/js/datepicker.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('vendor/datepicker/js/datepicker.en.js') }}" ></script>
<script>
    $(document).ready(function(){
        $('input[type="date"]').datepicker({
            language: 'en',
            dateFormat: 'yyyy-mm-dd',
            clearButton: true,
            autoClose: true,
        });

        $('#password, #confirmPassword').on('keyup', function() {
        	if($('#password').val() == $('#confirmPassword').val()) {
        		document.getElementById('confirmPassword').setCustomValidity('');
        	} else {
	        	document.getElementById('confirmPassword').setCustomValidity('Password does not match the confirm password.');
        	}
        });
    });
</script>
@endsection