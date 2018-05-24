@extends('layouts.homeDefault')
@section('content')
<!-- Page Features -->
<div class="category-containner">
  <div class="col-12 p-0 category m-t-b">
    <h5 class="m-0 btn btn-success">{{ $categoryName }}</h5>
  </div>
  <div class="row product-box">
    @if(count($products) == 0)
      <h5 class="error col-12">Không Có Sản Phẩm Nào</h5>
    @endif
    @foreach($products as $product)
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card box-shadow">
        <div data-productid="{{ $product->id }}" class="btn-show">
          <img class="card-img-top" src="img/medium/{{ $product->img }}" alt="">
          <div class="card-body">
            <h6 class="card-title">{{ $product->name }}</h6>
            @php
              $promotion = $product->promotion;
            @endphp
            @if (!isset($promotion))
              <span><b>{{ number_format($product->price) }} đ</b></span>
            @else
              @if (App\Models\Utilities::checkPromotionDate($promotion->start, $promotion->end))
                <span class="line-through"><b>{{ number_format($product->price) }} đ</b></span>
                <span class="text-danger"><b>{{ number_format($product->promotion->price) }} đ</b></span>
              @endif
            @endif
          </div>
        </div>
        <div class="card-footer">
          <span data-productid="{{ $product->id }}" class="btn btn-danger cursor-pointer btn-buy">Mua</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="d-flex">
    <div class="ml-auto">
      {{ $products->links() }}
    </div>
  </div>
</div>
@endsection