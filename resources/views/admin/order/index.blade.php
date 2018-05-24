@extends('admin.layouts.default')
@section('content')
<div class="table-responsive">
  {!! Form::open(['route' => ['order.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Delete Multiple', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit p-15', 'title' => 'Delete All Product Checked', 'onclick' => "return confirm('Delete All Product Checked?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        {{-- <th>Method</th> --}}
        <th>Payer</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Show</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>ID</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        {{-- <th>Method</th> --}}
        <th>Payer</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Show</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{ Form::checkbox('ids[]', $order->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ isset($order->user_id) ? $order->user_id : 'Customer' }}</td>
        <td>{{ isset($order->name) ? $order->name : $order->user->name }}</td>
        <td>{{ isset($order->email) ? $order->email : $order->user->email }}</td>
        <td>{{ isset($order->phone) ? $order->phone : $order->user->phone }}</td>
        {{-- <td>{{ $order->method }}</td> --}}
        <td>{!! $order->payer ? '<span class="text-success">Yes</span>' : '<span class="required">No</span>' !!}</td>
        <td>
          <label class="d-flex-center">
            {{ Form::checkbox('status', $order->id, $order->status, ['class' => 'checkbox-pay']) }}
            <span class="checkbox-span-pay">
              {!! $order->status ? '<span class="text-success">Paid</span>' : '<span class="required">Unpaid</span>' !!}
            </span>
          </label>
        </td>
        <td>{{ $order->created_at->format('H:i:s d/m/Y') }}</td>
        <td class="text-center"><a href="{{ route('order.show', $order->id) }}" class="fas fa-eye" title="Show: {{ $order->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{!! Form::open(['route' => ['order.update', 0], 'method' => 'put', 'id' => 'ajaxPayForm']) !!}
{!! Form::close() !!}
@endsection
@section('script')
<script type="text/javascript">
  $('.checkbox-pay').click(function() {
    if($(this).is(':checked'))
      $(this).siblings('.checkbox-span-pay').html('<span class="text-success">Paid</span>');
    else
      $(this).siblings('.checkbox-span-pay').html('<span class="required">Unpaid</span>');
    var url = '{{ route('order.update', '') }}/' + $(this).val();
    $.ajax({
      type: "POST",
      url: url,
      data: $("#ajaxPayForm").serialize(),
    });
  });
</script>
@endsection