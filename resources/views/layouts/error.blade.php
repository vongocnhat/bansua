@extends('layouts.homeDefault')
@section('content')
<div class="text-center">
	<img src="img/error.png" class="width-200">
	<h3 class="error">Lỗi Hệ Thống Vui Lòng Thử Lại Sau</h3>
	{{ Form::button('Back', ['onclick' => 'window.history.back()', 'class' => 'btn btn-danger m-t-b']) }}
</div>
@endsection