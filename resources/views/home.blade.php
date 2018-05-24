@extends('layouts.homeDefault')
@section('content')
@include('includes.slider')
<!-- Page Features -->
@foreach($categories as $category)
@if(count($category->products) > 0)
<div class="category-containner">
  <div class="col-12 p-0 category m-t-b"><a href="{{ route('categoryProduct', $category->id) }}" class="btn btn-success">
    <h5 class="m-0">{{ $category->name }}</h5></a>
  </div>
  <div class="row product-box">
    @php 
      $newProducts = $category->products()->orderBy('id', 'desc')->take(4)->get();
    @endphp
    @foreach($newProducts as $newProduct)
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card box-shadow">
        <div data-productid="{{ $newProduct->id }}" class="btn-show">
          <img class="card-img-top" src="img/medium/{{ $newProduct->img }}" alt="">
          <div class="card-body">
            <h6 class="card-title">{{ $newProduct->name }}</h6>
            @php
              $promotion = $newProduct->promotion;
            @endphp
            @if (!isset($promotion))
              <span><b>{{ number_format($newProduct->price) }} đ</b></span>
            @else
              @if (App\Models\Utilities::checkPromotionDate($promotion->start, $promotion->end))
                <span class="line-through"><b>{{ number_format($newProduct->price) }} đ</b></span>
                <span class="text-danger"><b>{{ number_format($newProduct->promotion->price) }} đ</b></span>
              @endif
            @endif
          </div>
        </div>
        <div class="card-footer">
          <span data-productid="{{ $newProduct->id }}" class="btn btn-danger btn-buy">Mua</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif
@endforeach
<div id="fb-root"></div>
@endsection
@section('css')
  <!-- slider -->
  <link rel="stylesheet" type="text/css" href="vendor/slider/css/style.css">
  <!-- //slider -->
@endsection
@section('script')
  <!-- slider -->
  <script src="vendor/slider/js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="vendor/slider/js/setting.js"></script>
  <script type="text/javascript" src="vendor/elevatezoom/jquery.elevatezoom.js"></script>
  <!-- //slider -->
@endsection