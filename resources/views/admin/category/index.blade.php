@extends('admin.layouts.default')
@section('content')
<div class="card-header p-15">
  <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
</div>
<div class="table-responsive">
  {!! Form::open(['route' => ['category.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ Form::checkbox('ids[]', $category->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->created_at->format('d/m/Y H:i:s') }}</td>
        <td>{{ $category->updated_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('category.edit', $category->id) }}" class="fas fa-edit" title="Edit: {{ $category->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection