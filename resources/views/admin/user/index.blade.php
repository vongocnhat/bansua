@extends('admin.layouts.default')
@section('content')
<div class="card-header p-15">
  <a href="{{ route('user.create') }}" class="btn btn-success">Create</a>
</div>
<div class="table-responsive">
  {!! Form::open(['route' => ['user.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Active</th>
        <th>Admin</th>
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
        <th>Email</th>
        <th>Phone</th>
        <th>Active</th>
        <th>Admin</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ Form::checkbox('ids[]', $user->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->active ? 'Yes' : 'No' }}</td>
        <td>{{ $user->admin ? 'Yes' : 'No' }}</td>
        <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
        <td>{{ $user->updated_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('user.edit', $user->id) }}" class="fas fa-edit" title="Edit: {{ $user->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection