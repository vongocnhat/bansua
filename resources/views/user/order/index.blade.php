@extends('layouts.homeDefault')
@section('content')
<div class="table-responsive">
  {!! Form::open(['route' => ['order.destroy', 0], 'method' => 'delete']) !!}
    {{ Form::button(' Hủy Tất Cả Đơn Hàng Được Chọn', ['type' => 'submit', 'class' => 'fas fa-trash-alt icon-submit', 'title' => 'Hủy Tất Cả Đơn Hàng Được Chọn', 'onclick' => "return confirm('Hủy Tất Cả Đơn Hàng Được Chọn?')"]) }}
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>Phương Thức Thanh Toán</th>
        <th>Trạng Thái</th>
        <th>Thời Gian Đặt Hàng</th>
        <th>Xem Chi Tiết</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ Form::checkbox(null, null, null, ['class' => 'parent-checkbox-delete']) }}</th>
        <th>Phương Thức Thanh Toán</th>
        <th>Trạng Thái</th>
        <th>Thời Gian Đặt Hàng</th>
        <th>Xem Chi Tiết</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{ Form::checkbox('ids[]', $order->id, null, ['class' => 'checkbox-delete']) }}</td>
        <td>{{ $order->method == 'offline' ? 'Thanh Toán Khi Nhận Hàng' : 'Thanh Toán Online' }}</td>
        <td>{!! $order->status ? '<span class="text-success">Đã Thanh Toán</span>' : '<span class="required">Chưa Thanh Toán</span>' !!}</td>
        <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
        <td class="text-center"><a href="{{ route('userCus.show') }}" class="fas fa-eye" title="Show: {{ $order->name }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection