@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-table"></i> <b>Create Admin</b>
</div>
<div class="p-15">
	{!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'put']) !!}
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control ' . $errors->first('name', 'is-invalid')]) }}
				<div class="invalid-feedback">
			        {{ $errors->first('name') }}
			    </div>
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description:') }}
				{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
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