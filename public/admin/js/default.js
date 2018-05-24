$('input[type="date"]').attr('max', '9999-12-31');
$('.parent-checkbox-delete').click(function() {
	if ($(this).is(':checked')) {
		$('.parent-checkbox-delete').prop('checked', true);
		$('.checkbox-delete').prop('checked', true);
	} else {
		$('.parent-checkbox-delete').prop('checked', false);
		$('.checkbox-delete').prop('checked', false);
	}
});
//delete checkbox
$(document).ready(function() {
	var lastChecked = null;
	$('#dataTable').on('click', '.checkbox-delete', function(e) {
	    if(!lastChecked) {
	        lastChecked = this;
	        return;
	    }
	    if(e.shiftKey) {
	        var start = $('.checkbox-delete').index(this);
	        var end = $('.checkbox-delete').index(lastChecked);
	        $('.checkbox-delete').slice(Math.min(start,end), Math.max(start,end)+ 1).prop('checked', lastChecked.checked);
	    }
	    lastChecked = this;
	});
});

$('input[name="phone"], input[name="price"]').keydown(function(e) {
	if (e.keyCode == 38 || e.keyCode == 40)
		return false;
});