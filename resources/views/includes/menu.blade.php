 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-n">
  <div class="container">
    <a class="navbar-brand" href=""><i class="fas fa-home"></i></a>
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="">Trang Chủ
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle btn-success" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Danh Mục Sữa
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($menuCategories as $key => $menuCategory)
              <a class="dropdown-item" href="{{ route('categoryProduct', $key) }}">{{ $menuCategory }}</a>
            @endforeach
          </div>
        </li>
{{--         <li class="nav-item">
          <a class="nav-link" href="#">Liên Hệ</a>
        </li> --}}
        <li class="nav-item">
          @if(!Auth::check())
          <span class="nav-link cursor-pointer" id="btn-login"><i class="fas fa-user-secret"></i> Đăng Nhập</span>
        </li>
          @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-secret"></i> Xin Chào: {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('customer.order') }}">Các Đơn Hàng</a>
            <a class="dropdown-item" href="{{ route('customer.edit', Auth::user()->id) }}">Thông Tin Tài Khoản</a>
            <a class="dropdown-item" href="{{ route('customer.logout') }}">Thoát</a>
          </div>
        </li>
        @endif
        {{ Form::open(['route' => 'home.search', 'class' => 'form-inline my-2 my-lg-0', 'method' => 'get']) }}
          {{ Form::search('search', null, ['class' => 'form-control mr-sm-2']) }}
          {{ Form::button('Tìm', ['class' => 'btn btn-outline-success my-2 my-sm-0 bg-primary text-white', 'type' => 'submit']) }}
        {{ Form::close() }}
      </ul>
    </div>
    <button class="ml-auto btn btn-danger" id="btn-cart">
      <span id="number-product">
        @if(Session::get('products'))
          {{ count(Session::get('products')) }}
        @else
        0
        @endif
      </span> <i class="fas fa-cart-arrow-down"></i>
    </button>
  </div>
</nav>