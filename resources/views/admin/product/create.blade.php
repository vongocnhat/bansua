@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-table"></i> <b>Create Product</b>
</div>
<div class="p-15">
	{!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('category_id', 'Category Name:') }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Please Select']) }}
			</div>
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('img', 'Image:') }}
				{{ Form::file('img', ['class' => 'form-control', 'accept' => 'image/*']) }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('price', 'Price:') }}
				{{ Form::number('price', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('quantity', 'Quantity:') }}
				{{ Form::number('quantity', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('packet', 'Packet:') }}
				{{ Form::text('packet', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group col-12">
			<div class="form-group">
				{{ Form::label('summary', 'Summary:') }}
				{{ Form::textarea('summary', null, ['class' => 'form-control', 'rows' => '3']) }}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description:') }}
				{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) }}
			</div>
		</div>
		<div class="form-group col-12">
			{{ Form::submit('Create', ['class' => 'btn btn-success']) }}
			<a href="{{ route('product.index') }}" class="btn btn-danger">@lang('default.cancel')</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
@section('script')
<script type="text/javascript" src="admin/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('summary');
CKEDITOR.replace('description');
</script>
@endsection