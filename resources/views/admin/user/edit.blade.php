@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-edit"></i> <b>Edit {{ $user->admin ? 'Admin' : 'User' }}</b>
</div>
<div class="p-15">
	{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('confirmPassword', 'Confirm Password:') }}
				{{ Form::password('confirmPassword', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Phone:') }}
				{{ Form::number('phone', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Birthday:') }}
				{{ Form::date('birthday', null, ['class' => 'form-control no-spin']) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'City:') }}
				{{ Form::text('city', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Country:') }}
				{{ Form::text('country', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('active', 'Active:') }}
				<label class="border p-1">Yes {{ Form::radio('active', 1, null) }}</label>
				<label class="border p-1">No {{ Form::radio('active', 0, null) }}</label>
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Gender:') }}
				<label class="border p-1">Male {{ Form::radio('gender', 1, null) }}</label>
				<label class="border p-1">Female {{ Form::radio('gender', 0, null) }}</label>
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