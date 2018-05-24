@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-table"></i> <b>Create Admin</b>
</div>
<div class="p-15">
	{!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description:') }}
				{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'required']) }}
			</div>
		</div>
		<div class="form-group col-12">
			{{ Form::submit('Create', ['class' => 'btn btn-success']) }}
			{{ Form::button('Cancel', ['class' => 'btn btn-danger', 'onclick' => 'window.history.back()']) }}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection