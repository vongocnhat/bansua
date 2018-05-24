@extends('layouts.homeDefault')
@section('content')
{{ Form::model(Auth::user(), ['route' => 'cart.store', 'method' => 'post']) }}
<div class="row ml-0 mr-0 m-t-b">
  <div class="user-box">
    <h5 class="color-blue">Thông Tin Người Nhận</h5>
    <div class="row btn-clear-box">
      <div class="col-12 col-md-6">
        <div class="form-group">
          {{ Form::label('name', 'Họ Và Tên Người Nhận: ') }}
          {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('email', 'Email: ') }}
          {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('phone', 'Số Điện Thoại: ') }}
          {{ Form::number('phone', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('birthday', 'Ngày Sinh: ') }}
          {{ Form::date('birthday', null, ['class' => 'form-control no-spin', 'required']) }}
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          {{ Form::label('city', 'Thành Phố: ') }}
          {{ Form::text('city', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('country', 'Quận/Huyện: ') }}
          {{ Form::text('country', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('address', 'Địa Chỉ: ') }}
          {{ Form::text('address', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label(null, 'Giới Tính: ') }}
          <label>Nam {{ Form::radio('gender', 1, null, ['required']) }}</label>
          <label>Nữ {{ Form::radio('gender', 0, null, ['required']) }}</label>
        </div>
      </div>
    </div>
    <div class="form-group m-t-b">
        {{ Form::button('Xóa Thông Tin Người Nhận', ['class' => 'btn btn-primary btn-clear']) }}
      </div>
    <div class="form-group order-method">
      <h5 class="color-blue">Hình Thức Thanh Toán: </h5>
      <label class="btn btn-success">
        Thanh Toán Khi Nhận Hàng {{ Form::radio('method', 'offline', null, ['class' => 'btn btn-success', 'required']) }}
      </label>
     {{--  <label class="btn btn-danger">
        Thanh Toán Trực Tuyến {{ Form::radio('method', 'online', null, ['class' => 'btn btn-danger', 'required']) }}
      </label> --}}
       <label class="payer-label d-none-n col-12 p-0">Tặng Quà ( Người Thanh Toán Khác Người Nhận Hàng ) {{ Form::checkbox('payer', 'payer') }}</label>
    </div>
  </div>
  <div class="order-box">
    <h6 class="order-title color-blue">Thông Tin Đơn Hàng</h6>
    @php
      $totalPay = 0;
    @endphp
    @if(Session()->get('products') != null)
    @foreach(Session()->get('products') as $productInCart)
      @php
        $totalPrice = $productInCart['quantity'] * $productInCart['price'];
        $totalPay += $totalPrice;
      @endphp
    <div class="product-order">
      <h6>{{ $productInCart['name'] }}</h6>
      <span>Đơn Giá: </span> {{ number_format($productInCart['price']) }} đ X {{ $productInCart['quantity'] }}
      <br>
      <span>Tổng Tiền: {{ number_format($totalPrice) }} đ</span>
    </div>
    @endforeach
    <span>Tổng Đơn Hàng: {{ number_format($totalPay) }} đ</span><br>
    @endif
    <button type="submit" class="btn btn-danger m-t-b">Đặt Hàng</button>
  </div>
</div>
{{ Form::close() }}
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="vendor/datepicker/css/datepicker.min.css">
<link rel="stylesheet" type="text/css" href="css/order-create.css">
@endsection
@section('script')
<script type="text/javascript" src="vendor/datepicker/js/datepicker.min.js" ></script>
<script type="text/javascript" src="vendor/datepicker/js/datepicker.en.js" ></script>
<script>
    $(document).ready(function(){
        $('input[type="date"]').datepicker({
            language: 'en',
            dateFormat: 'yyyy-mm-dd',
            clearButton: true,
            autoClose: true,
        });
    });
</script>
<script type="text/javascript">
  $('.btn-clear').click(function() {
    $('.btn-clear-box input').val('');
    $('.btn-clear-box input[type="radio"]').prop('checked', false);
  });
  $('input[name="method"]').change(function() {
    if ($(this).val() == 'offline') {
      $('.payer-label').show();
    } else {
      $('.payer-label').hide();
      $('.payer-label input[name="payer"]').prop('checked', false);
    }
  });
</script>
@endsection