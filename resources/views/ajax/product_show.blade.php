<div class="col-4">
    <img src="img/large/{{ $product->img }}" class="product-image" data-zoom-image="img/large/{{ $product->img }}">
</div>
<div class="col-8">
    <h5>{{ $product->name }}</h5>
    <span><b>Quy cách thùng:</b> {{ $product->packet }}</span>
    <div class="col-12 p-0">{!! $product->summary !!}</div>
    <span class="color-blue m-t-b cursor-pointer" id="btn-product-description">Xem Chi Tiết</span>
    </ul><br>
    <b>Giá: {{ number_format($product->price) }} đ</b><br>
    <div class="row m-t-b ml-0 mr-0">
        <span class="mr-2">Số Lượng:</span>
        <input type="number" min="1" name="quantity" value="1" class="mr-1 form-control input-quantity" id="input-quantity-cart">lốc
    </div>
    <button data-productid="{{ $product->id }}" class="btn btn-danger" id="btn-addtocart">Thêm Vào Giỏ Hàng</button>
</div>
<div class="product-description col-12" id="product-description">
    <h5 class="m-t-b color-blue">MÔ TẢ SẢN PHẨM</h5>
    <b>Quy cách thùng:</b> {{ $product->packet }}<br>
    <b>Tên sản phẩm:</b> {{ $product->name }}<br>
    {!! $product->description !!}
</div>
<div class="product-detail p-15">
    <h5 class="m-t-b color-blue">Thông Số Sản Phẩm</h5>
    @if(count($product->productDetails) > 0)
    <table class="table-n table-bordered table-striped">
        <tbody>
            @foreach($product->productDetails as $productDetail)
            <tr>
                <td>{{ $productDetail->name }}</td>
                <td>{{ $productDetail->value }} {{ $productDetail->unit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        Chưa có thông tin
    @endif
</div>
<!-- Page Features -->
{{-- <div class="category-containner col-12">
    <div class="col-12 p-0 category m-t-b"><a href="#" class="btn btn-success"><h5 class="m-0">Sản Phẩm Cùng Loại</h5></a></div>
    <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="img/medium/1.jpg" alt="">
                <div class="card-body">
                    <h6 class="card-title">Sữa đậu nành Vinamilk hạt Óc chó - Lốc 4 hộp x 180ml</h6>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">Mua</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="img/medium/1.jpg" alt="">
                <div class="card-body">
                    <h6 class="card-title">Sữa đậu nành Vinamilk hạt Óc chó - Lốc 4 hộp x 180ml</h6>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">Mua</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="img/medium/1.jpg" alt="">
                <div class="card-body">
                    <h6 class="card-title">Sữa đậu nành Vinamilk hạt Óc chó - Lốc 4 hộp x 180ml</h6>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">Mua</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="img/medium/1.jpg" alt="">
                <div class="card-body">
                    <h6 class="card-title">Sữa đậu nành Vinamilk hạt Óc chó - Lốc 4 hộp x 180ml</h6>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">Mua</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<br>
<h5 class="text-primary col-12 m-t-b">Các Bình Luận</h5>
<div class="fb-comments col-12" data-width="100%" data-href="https://www.youtube.com/{{ route('productShowHome', $product->id) }}" data-numposts="5"></div>
<script type="text/javascript">
    FB.XFBML.parse();
    $(document).ready(function() {
        $('.product-image').elevateZoom();
    });
</script>