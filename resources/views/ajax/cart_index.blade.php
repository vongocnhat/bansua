@if(Session()->get('products') != null)
    <table class="table table-bordered">
        <thead>
	        <tr>
	            <th>Sản Phẩm</th>
	            <th>Số Lượng</th>
	            <th>Đơn Giá</th>
	            <th>Tổng Tiền</th>
	            <th>Xóa</th>
	        </tr>
        </thead>
        <tbody>
			@foreach(Session()->get('products') as $productInCart)
			<tr>
			    <td>{{ $productInCart["name"] }}</td>
			    <td>{{ Form::number('quantity', $productInCart['quantity'], ['class' => 'form-control input-quantity input-quantity-change', 'data-productid' => $productInCart['product_id'], 'min' => '1']) }}</td>
			    <td class="cart-price" data-price="{{ $productInCart['price'] }}">{{ number_format($productInCart['price']) }} đ</td>
			    <td class="total-price-td"><span class="total-price">{{ number_format($productInCart['price'] * $productInCart['quantity']) }}</span> đ</td>
			    <td><button data-productid="{{ $productInCart['product_id'] }}" class="btn btn-danger btn-cart-destroy">X</button></td>
			</tr>
			@endforeach
        </tbody>
	</table>
	<span class="col-12 p-0 m-t-b d-block"><b>Tổng Tiền:</b> <span id="total-pay"></span> đ</span>
	<a href="{{ route('orderCus.create') }}" class="btn btn-success">Thanh Toán</a>
@else
<h5 class="error">Bạn Chưa Có Sản Phẩm Nào Trong Giỏ Hàng</h5>
@endif