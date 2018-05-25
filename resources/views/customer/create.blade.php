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
{{ Form::open(['route' => 'customer.store', 'method' => 'post']) }}
<h5 class="color-blue m-t-b">Nhập Thông Tin Của Bạn</h5>
<div class="row">
	<div class="col-12 col-md-6">
        <div class="form-group">
            {{ Form::label('name', 'Họ Và Tên Người Nhận: ') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Số Điện Thoại: ') }}
            {{ Form::number('phone', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('birthday', 'Ngày Sinh: ') }}
            {{ Form::date('birthday', null, ['class' => 'form-control no-spin', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label(null, 'Giới Tính: ') }}
            <label>Nam {{ Form::radio('gender', 1, null, ['required']) }}</label>
            <label>Nữ {{ Form::radio('gender', 0, null, ['required']) }}</label>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            {{ Form::label('city', 'Thành Phố: ') }}
            {{ Form::text('city', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('country', 'Quận/Huyện: ') }}
            {{ Form::text('country', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Địa Chỉ: ') }}
            {{ Form::text('address', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <h5 class="color-blue m-t-b">Thông Tin Đăng Nhập</h5>
        <div class="form-group">
            {{ Form::label('email', 'Email: ') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Mật Khẩu: ') }}
            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Đăng Ký', ['class' => 'btn btn-success m-t-b']) }}
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="vendor/datepicker/css/datepicker.min.css">
@endsection
@section('script')
<script type="text/javascript" src="vendor/datepicker/js/datepicker.min.js" ></script>
<script type="text/javascript" src="vendor/datepicker/js/datepicker.en.js" ></script>
<script>
    $(document).ready(function(){
        $('input[type="date"]').datepicker({
            language: 'en',
            dateFormat: 'yyyy-mm-dd',
            clearButton: true,
            autoClose: true,
        });
    });
</script>
@endsection