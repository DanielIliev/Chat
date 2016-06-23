$(function() {
	/* Registration */
	$("#reg_form").on("submit", function(e) {
		var data = $('#reg_form :input').serializeArray();
		$.post($('#reg_form').attr('action'), data, function(info) {
			alert(info);
		}).done(function() {
			$.mobile.navigate('#home');
		});
		e.preventDefault();
	});
});
