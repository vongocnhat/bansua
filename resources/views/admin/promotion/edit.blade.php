@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-table"></i> <b>Create Admin</b>
</div>
<div class="p-15">
	{!! Form::model($promotion, ['route' => ['promotion.update', $promotion->id], 'method' => 'put']) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('product_id', 'Product Name:') }}
				{{ Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => 'Please Select']) }}
			</div>
			<div class="form-group">
				{{ Form::label('price', 'Price:') }}
				{{ Form::label('price', 'Price:') }}
				{{ Form::number('price', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('start', 'Start Date:') }}
				{{ Form::date('start', null, ['class' => 'form-control no-spin']) }}
			</div>
			<div class="form-group">
				{{ Form::label('end', 'End Date:') }}
				{{ Form::date('end', null, ['class' => 'form-control no-spin']) }}
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
    });
</script>
@endsection