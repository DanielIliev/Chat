$(function() {
	/* Hide chat view for unlogged users */
	$('.chatview').hide();
	/* Registration */
	$('#reg_form').on('submit', function(e) {
		var data = $('#reg_form :input').serializeArray();
		$.post($('#reg_form').attr('action'), data, function(info) {
			if (info.localeCompare('Registration is successful') === 0) {
				alert(info);
				$.mobile.navigate('#login');
			} else {
				alert(info);
			}
		});
		e.preventDefault();
	});
	/* Login */
	$('#login_form').on('submit', function(e) {
		var data = $('#login_form :input').serializeArray();
		$.post($('#login_form').attr('action'), data, function(info) {
			if (info === '') {
				alert('Wrong username or password');
			} else {
				$.mobile.navigate('#home');
				localStorage.setItem('username', info);
				$('#name').text('Welcome ' + localStorage.getItem('username'));
				$('input[type="hidden"]').attr('value', localStorage.getItem('username'));
				$('a[href="#auth"]').attr('href', '#home').text('Continue Chatting');
				$('.chatview').delay(500).show(0);
				$('.error').hide();
			}
		});
		e.preventDefault();
	});
	/* Save new message */
	$('#writemsg_form').on('submit', function(e) {
		var data = $('#writemsg_form :input').serializeArray();
		$.post($('#writemsg_form').attr('action'), data, function(info) {
			$('input[name="usermsg"]').val('');
		});
		e.preventDefault();
	});
});
