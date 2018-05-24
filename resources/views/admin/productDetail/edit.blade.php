@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-table"></i> <b>Create Product Detail</b>
</div>
<div class="p-15">
	{!! Form::model($productDetail, ['route' => ['productDetail.update', $productDetail->id], 'method' => 'put']) !!}
	{{ Form::hidden('product_id', null) }}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('productName', 'Product Name:') }}
				{{ Form::text('productName', $productNameAndID, ['class' => 'form-control', 'readonly', 'required']) }}
			</div>
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
			</div>
			<div class="form-group">
				{{ Form::label('value', 'Value:') }}
				{{ Form::number('value', null, ['class' => 'form-control', 'step' => 'any', 'required']) }}
			</div>
			<div class="form-group">
				{{ Form::label('unit', 'Unit:') }}
				{{ Form::text('unit', null, ['class' => 'form-control', 'required']) }}
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