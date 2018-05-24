@extends('layouts.homeDefault')
@section('content')
<div class="text-center">
	<img src="img/error.png" class="width-200">
	<h3 class="error">Sorry, the page you are looking for could not be found.</h3>
	{{ Form::button('Back', ['onclick' => 'window.history.back()', 'class' => 'btn btn-danger m-t-b']) }}
</div>
@endsection