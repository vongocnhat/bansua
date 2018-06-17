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
				{{ Form::label('name', __('category.name')) }}
				{{ Form::text('name', null, ['class' => 'form-control ' . $errors->first('name', 'is-invalid')]) }}
				<div class="invalid-feedback">
			        {{ $errors->first('name') }}
			    </div>
			</div>
			<div class="form-group">
				{{ Form::label('description', __('category.description')) }}
				{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
			</div>
		</div>
		<div class="form-group col-12">
			{{ Form::submit('Create', ['class' => 'btn btn-success']) }}
			<a href="{{ route('category.index') }}" class="btn btn-danger">@lang('default.cancel')</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection