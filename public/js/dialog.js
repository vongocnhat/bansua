//hide dialog
$('body, .btn-cancel').click(function() {
	$('.dialog-dark').hide(500);
	$('body').css('overflow', '');
	$('.box-ajax').html('');
});
$(document).keyup(function(e) {
	if(e.keyCode == 27)
	{
		$('.dialog-dark').hide(500);
		$('body').css('overflow', '');
		$('.box-ajax').html('');
	}
});
// ignore click body
$('#btn-cart, .dialog-box, .btn-show, #btn-login, #btn-login-in-cart').click(function(e) {
	e.stopPropagation();
});
$('#btn-cart').click(function() {
	$('#cart-box').show(500);
	setTimeout(function() { $('body').css('overflow', 'hidden'); }, 500);
});
// btn-login click
$('#btn-login').click(function() {
	$('#login-box').show(500);
	setTimeout(function() { $('body').css('overflow', 'hidden'); }, 500);
});
//show notify
setTimeout(function() { $('#notify-box').hide(500); }, 5000);