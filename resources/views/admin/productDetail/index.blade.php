<div class="card-header p-15 border-top">
  <h5 class="text-info">Product Detail</h5>
  {{ Form::open(['route' => 'productDetail.create', 'method' => 'get']) }}
    {{ Form::hidden('product_id', $product->id) }}
    {{ Form::submit('Create', ['class' => 'btn btn-success']) }}
  {{ Form::close() }}
</div>
<div class="table-responsive">
  {!! Form::open(['route' => ['productDetail.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>Name</th>
        <th>Value</th>
        <th>Unit</th>
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
        <th>Value</th>
        <th>Unit</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($product->productDetails as $productDetail)
      <tr>
        <td>{{ Form::checkbox('ids[]', $productDetail->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $productDetail->id }}</td>
        <td>{{ $productDetail->name }}</td>
        <td>{{ $productDetail->value }}</td>
        <td>{{ $productDetail->unit }}</td>
        <td>{{ $productDetail->created_at->format('d/m/Y H:i:s') }}</td>
        <td>{{ $productDetail->updated_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('productDetail.edit', $productDetail->id) }}" class="fas fa-edit" title="Edit: {{ $productDetail->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>