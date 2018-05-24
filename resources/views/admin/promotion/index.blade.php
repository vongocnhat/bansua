@extends('admin.layouts.default')
@section('content')
<div class="card-header p-15">
  <a href="{{ route('promotion.create') }}" class="btn btn-success">Create</a>
</div>
<div class="table-responsive">
  {!! Form::open(['route' => ['promotion.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>ProductID</th>
        <th>price</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>ProductID</th>
        <th>price</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($promotions as $promotion)
      <tr>
        <td>{{ Form::checkbox('ids[]', $promotion->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $promotion->id }}</td>
        <td>{{ $promotion->product_id }}</td>
        <td>{{ number_format($promotion->price) }} đ</td>
        <td>{{ date('d/m/Y', strtotime($promotion->start)) }}</td>
        <td>{{ date('d/m/Y', strtotime($promotion->end)) }}</td>
        <td>{{ $promotion->created_at->format('d/m/Y H:i:s') }}</td>
        <td>{{ $promotion->updated_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('promotion.edit', $promotion->id) }}" class="fas fa-edit" title="Edit: {{ $promotion->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection