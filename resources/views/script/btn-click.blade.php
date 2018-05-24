<script type="text/javascript">
(function() {
	var productIDClicked = [];
	var timeIncreaseCart = 1500;
	Array.prototype.remove = function(x) { 
    var i;
    for(i in this){
	        if(this[i].toString() == x.toString()){
	            this.splice(i,1)
	        }
	    }
	}
	@if(Session::get('products'))
		@foreach(Session::get('products') as $product)
			productIDClicked.push({{ $product['product_id'] }});
		@endforeach
	@endif
	// product show
	$('.btn-show').click(function() {
		$('#product-detail-box').show(500);
		setTimeout(function(){ $('body').css('overflow', 'hidden') }, 500);
		var productID = $(this).data('productid');
		var url = '{{ route('productShowHome', '') }}/' + productID;
		$.ajax({
			url: url,
			success: function(data) {
				$('.product-detail-ajax').html(data);
			}
		});
		$('#product-detail-box').scrollTop(0);
	});
	//// product show
	// mua click
	function updateToCart(productID, quantity) {
		var url = '{{ route('cart.update', ['', '']) }}/' + productID + '/' + quantity;
		$.ajax({
			url: url
		});
	}
	function totalPay() {
		$(document).ajaxComplete(function() {
			var totalPay = 0;
			$('.total-price').each(function() {
				totalPay += parseInt($(this).text().replace(',', ''));
			});
			$('#total-pay').text(totalPay.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		});
	}
	$('.btn-buy').click(function() {
		var productID = $(this).data('productid');
		updateToCart(productID, 1);
		if (productIDClicked.indexOf(productID) == -1) {
			productIDClicked.push(productID);
			setTimeout(function(){ $('#number-product').text(parseInt($('#number-product').text())+1); }, timeIncreaseCart);
		}
		// animate move product to cart
		var d = document.createElement('div');
		$(d).addClass('card-img-top-box')
		var imgHTML = $(this).parent().parent().parent().find('.card-img-top')[0].outerHTML;
		$(d).html(imgHTML);
		$(d).addClass('product-to-top');
		$(d).css('bottom', $(document).scrollTop() + $(window).height() - $(this).offset().top);
		$(this).append($(d)[0].outerHTML);
		$(this).find('.card-img-top-box').animate(
            {
                'top' : 0,
                'right' : 0,
                'opacity' : 0
            },timeIncreaseCart,
            function(){
                $(this).remove();
            });
		//// animate move product to cart
	});
	//// mua click
	// btn-addtocart click
	$('.product-detail-ajax').on('click', '#btn-addtocart', function() {
		var productID = $(this).data('productid');
		var quantity = $('#input-quantity-cart').val();
		updateToCart(productID, quantity);
		if (productIDClicked.indexOf(productID) == -1) {
			productIDClicked.push(productID);
			$('#number-product').text(parseInt($('#number-product').text())+1);
		}

	});
	//// btn-addtocart click
	// btn-cart click
	$('#btn-cart').click(function() {
		totalPay();
		var url = '{{ route('cart.index') }}';
		$.ajax({
			url: url,
			success: function(data) {
				$('.cart-ajax').html(data);
			}
		});
	});
	//// btn-cart click
	// input in cart change
	$('.cart-ajax').on('change', '.input-quantity-change', function() {
		var productID = $(this).data('productid');
		var quantity = $(this).val();
		// total price
		var price = $(this).parent().siblings('.cart-price').data('price');
		var totalPrice = (quantity * price);
		totalPrice = totalPrice.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$(this).parent().siblings('.total-price-td').find('.total-price').text(totalPrice);
		//// total price
		// total pay
		totalPay();
		//// total pay
		var url = '{{ route('cart.quantity', ['', '']) }}/' + productID + '/' + quantity;
		$.ajax({
			url: url
		})
	});
	//// input in cart change
	// btn-cart-destroy click
	$('.cart-ajax').on('click', '.btn-cart-destroy', function() {
		totalPay();
		$(this).parent().parent().remove();
		var productID = $(this).data('productid');
		var url = '{{ route('cart.destroy', '') }}/' + productID;
		$.ajax({
			url: url
		});
		productIDClicked.remove(productID);
		$('#number-product').text(parseInt($('#number-product').text())-1);
	});
	//// btn-cart-destroy
}());
</script>