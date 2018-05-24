@extends('layouts.homeDefault')
@section('content')
<div class="card-header">
  <i class="fa fa-edit"></i> <b>Đặt Hàng Lúc: {{ $order->created_at->format('H:i:s d/m/Y') }}</b></div>
<div>
<div class="p-15">
	<div class="row">
		<div class="col-12"><h5>Người Nhận</h5></div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Tên Người Nhận:') }}
				{{ $order->name }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ $order->email }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Số Điện Thoại:') }}
				{{ $order->phone }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Giới Tính:') }}
				{{ $order->gender ? 'Nam' : 'Nữ' }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Ngày Sinh:') }}
				{{ date('d/m/Y', strtotime($order->birthday)) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'Thành Phố:') }}
				{{ $order->city }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Quận/Huyện:') }}
				{{ $order->country }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Địa Chỉ:') }}
				{{ $order->address }}
			</div>
		</div>
		@if(isset($order->payer))
		<div class="col-12 border-top"><h5>Người Thanh Toán</h5></div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Tên Người Thanh Toán:') }}
				{{ $order->payer->name }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ $order->payer->email }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Số Điện Thoại:') }}
				{{ $order->payer->phone }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Giới Tính:') }}
				{{ $order->payer->gender ? 'Nam' : 'Nữ' }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Ngày Sinh:') }}
				{{ date('d/m/Y', strtotime($order->payer->birthday)) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'Thành Phố:') }}
				{{ $order->payer->city }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Quạn/Huyện:') }}
				{{ $order->payer->country }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Địa Chỉ') }}
				{{ $order->payer->address }}
			</div>
		</div>
		@endif
		<div class="col-12 border-top">
			<h5>Order Information</h5>
			<div class="form-group">
				{{ Form::label('method', 'Phương Thức Thanh Toán:') }}
				{{ $order->method == 'offline' ? 'Thanh Toán Khi Nhận Hàng' : 'Thanh Toán Online' }}
			</div>
			<div class="form-group">
				{{ Form::label('totalQuantity', 'Tổng Số Sản Phẩm:') }}
				{{ $order->totalQuantity }}
			</div>
			<div class="form-group">
				{{ Form::label('total_price', 'Tổng Giá:') }}
				{{ number_format($order->total_price) }} đ
			</div>
			<div class="form-group">
				{{ Form::label('status', 'Trạng Thái Thanh Toán:') }}
				{!! $order->status ? '<span class="text-success">Đã Thanh Toán</span>' : '<span class="required">Chưa Thanh Toán</span>' !!}
			</div>
		</div>
		<div class="col-12 border-top p-0">
			<h5 class="p-15">Chi Tiết Đơn Hàng</h5>
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			      <thead>
			        <tr>
			          <th>Product ID</th>
			          <th>Price</th>
			          <th>Quantity</th>
			          <th>Created At</th>
			        </tr>
			      </thead>
			      <tfoot>
			        <tr>
			          <th>Product ID</th>
			          <th>Price</th>
			          <th>Quantity</th>
			          <th>Created At</th>
			        </tr>
			      </tfoot>
			      <tbody>
			      	
			        @foreach($order->products()->get() as $orderDetail)
			        <tr>
			          <td>{{ $orderDetail->pivot->product_id }}</td>
			          <td>{{ number_format($orderDetail->pivot->price) }} đ</td>
			          <td>{{ $orderDetail->pivot->quantity }}</td>
			          <td>{{ $orderDetail->pivot->created_at->format('d/m/Y H:i:s') }}</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
			  </div>
		</div>
		<div class="form-group">
			{{ Form::button('Back', ['class' => 'btn btn-danger', 'onclick' => 'window.history.back()']) }}
		</div>
	</div>
</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datepicker/css/datepicker.min.css') }}">
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('vendor/datepicker/js/datepicker.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('vendor/datepicker/js/datepicker.en.js') }}" ></script>
<script>
    $(document).ready(function(){
        $('input[type="date"]').datepicker({
            language: 'en',
            dateFormat: 'yyyy-mm-dd',
            clearButton: true,
            autoClose: true,
        });

        $('#password, #confirmPassword').on('keyup', function() {
        	if($('#password').val() == $('#confirmPassword').val()) {
        		document.getElementById('confirmPassword').setCustomValidity('');
        	} else {
	        	document.getElementById('confirmPassword').setCustomValidity('Password does not match the confirm password.');
        	}
        });
    });
</script>
@endsection