$('#login-form').submit(function (e) {
	e.preventDefault();
	var url = $(this).attr('action');
	$('#login-error').hide();
	$.ajax({
        type: "POST",
        url: url,
        data: $("#login-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == 'Đăng Nhập Thất Bại')
            {
                $('#login-error').text(data);
                $('#login-error').show(500);
            } else {
            	window.location.href = data;
            }
        }
    });
})