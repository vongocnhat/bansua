$(document).ajaxComplete(function() {
	$("#btn-product-description").click(function() {
	    $('#product-detail-box').animate({
	    	scrollTop: $("#product-description").offset().top - $('html, body').scrollTop()
		}, 500);
	});
});
$('input[type="date"]').attr('max', '9999-12-31');