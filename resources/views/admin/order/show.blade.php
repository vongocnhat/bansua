@extends('admin.layouts.default')
@section('content')
<div class="card-header">
  <i class="fa fa-edit"></i> <b>Show Order Created At: {{ $order->created_at->format('H:i:s d/m/Y') }}</b></div>
<div>
<div class="p-15">
	<div class="row">
		<div class="col-12"><h5>Receiver</h5></div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ $order->name }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ $order->email }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Phone:') }}
				{{ $order->phone }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Gender:') }}
				{{ $order->gender ? 'Male' : 'Female' }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Birthday:') }}
				{{ date('d/m/Y', strtotime($order->birthday)) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'City:') }}
				{{ $order->city }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Country:') }}
				{{ $order->country }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ $order->address }}
			</div>
		</div>
		@if(isset($order->payer))
		<div class="col-12 border-top"><h5>Payer</h5></div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ $order->payer->name }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ $order->payer->email }}
			</div>
			<div class="form-group">
				{{ Form::label('phone', 'Phone:') }}
				{{ $order->payer->phone }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Gender:') }}
				{{ $order->payer->gender ? 'Male' : 'Female' }}
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				{{ Form::label('birthday', 'Birthday:') }}
				{{ date('d/m/Y', strtotime($order->payer->birthday)) }}
			</div>
			<div class="form-group">
				{{ Form::label('city', 'City:') }}
				{{ $order->payer->city }}
			</div>
			<div class="form-group">
				{{ Form::label('country', 'Country:') }}
				{{ $order->payer->country }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ $order->payer->address }}
			</div>
		</div>
		@endif
		<div class="col-12 border-top">
			<h5>Order Information</h5>
			<div class="form-group">
				{{ Form::label('method', 'Method:') }}
				{{ $order->method }}
			</div>
			<div class="form-group">
				{{ Form::label('totalQuantity', 'Total Quantity:') }}
				{{ $order->totalQuantity }}
			</div>
			<div class="form-group">
				{{ Form::label('total_price', 'Total Price:') }}
				{{ number_format($order->total_price) }} đ
			</div>
			<div class="form-group">
				{{ Form::label('status', 'Status:') }}
				{!! $order->status ? '<span class="text-success">Paid</span>' : '<span class="required">Unpaid</span>' !!}
			</div>
		</div>
		<div class="col-12 border-top p-0">
			<h5 class="p-15">Order Details</h5>
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
		<div class="form-group col-12">
			<a href="{{ route('order.index') }}" class="btn btn-danger">Cancel</a>
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