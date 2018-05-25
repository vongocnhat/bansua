<!-- dialog -->
<div class="dialog-dark" id="product-detail-box">
  <div class="dialog-box">
    <div class="dialog-titlebox">
      <span class="dialog-title">Thông Tin Sản Phẩm</span>
      <button class="btn btn-danger btn-cancel">X</button>
    </div>
    <div class="dialog-content col-12">
      <div class="row product-detail-ajax box-ajax">
        
      </div>  
    </div>
  </div>
</div>
<!-- //dialog -->
    <!-- dialog -->
<div class="dialog-dark" id="cart-box">
  <div class="dialog-box">
    <div class="dialog-titlebox">
      <span class="dialog-title">Thông Tin Giỏ Hàng</span>
      <button class="btn btn-danger btn-cancel">X</button>
    </div>
    <div class="dialog-content cart-ajax box-ajax">

    </div>
  </div>
</div>
<!-- //dialog -->
{{-- login form --}}
<div class="dialog-dark" id="login-box">
  <div class="dialog-box">
    <div class="dialog-titlebox">
      <span class="dialog-title">Đăng Nhập</span>
      <button class="btn btn-danger btn-cancel">X</button>
    </div>
    <div class="dialog-content">
      {{ Form::open(['route' => 'customer.login', 'method' => 'post', 'id' => 'login-form']) }}
        <div class="form-group"> 
          {{ Form::label('email', 'Email Hoặc Số Điện Thoại: ') }}
          {{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group"> 
          {{ Form::label('password', 'Mật Khẩu: ') }}
          {{ Form::password('password', ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
          <span class="error" id="login-error"></span>
        </div>
        <div class="form-group m-t-b"> 
          {{ Form::submit('Đăng Nhập', ['class' => 'btn btn-success']) }}
          <a href="{{ route('customer.create') }}" class="btn btn-info float-right">Đăng Ký</a>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
{{-- //login --}}
{{-- show notify --}}
@if(Session::has('notify'))
<div class="dialog-dark" id="notify-box">
  <div class="dialog-box">
    <div class="dialog-titlebox">
      <span class="dialog-title">Thông Báo</span>
      <button class="btn btn-danger btn-cancel">X</button>
    </div>
    <div class="dialog-content box-ajax">
      {{ Session::get('notify') }}
    </div>
  </div>
</div>
@endif
{{-- //show notify --}}