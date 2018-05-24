@extends('admin.layouts.default')
@section('content')
<div class="card-header p-15">
  <a href="{{ route('product.create') }}" class="btn btn-success">Create</a>
</div>
<div class="table-responsive">
  {!! Form::open(['route' => ['product.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Category Name</th>
        <th>Name</th>
        <th>Img</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Packet</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Category Name</th>
        <th>Name</th>
        <th>Img</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Packet</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ Form::checkbox('ids[]', $product->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->name }}</td>
        <td><img class="thumb-n" src="img/medium/{{ $product->img }}"></td>
        <td>{{ $product->quantity }}</td>
        <td class="space-nowrap">{{ number_format($product->price) }} đ</td>
        <td>{{ $product->packet }}</td>
        <td>{{ $product->created_at->format('d/m/Y H:i:s') }}</td>
        <td>{{ $product->updated_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('product.edit', $product->id) }}" class="fas fa-edit" title="Edit: {{ $product->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection