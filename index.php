<?php include('header.php') ?>
	<section class="registration">
		<form method="POST" action="scripts/createUser.php" id="reg_form">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">Registration</h4>
							</div>
						<div class="panel-body">
							<fieldset class="form-group">
								<label for="username">Username</label>
								<input type="text" name="user" class="form-control" id="username" placeholder="Username..." maxlength="20" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="password">Password</label>
								<input type="password" name="pass" class="form-control" id="password" placeholder="Password..." maxlength="20" required>
							</fieldset>
							<input type="submit" value="Register" class="btn btn-default" />
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
	<script>
		$(function() {
			$("#reg_form").on("submit", function(e) {
				var data = $('#reg_form :input').serializeArray();
				$.post($('#reg_form').attr('action'), data, function(info) {
					alert(info);
				});
				e.preventDefault();
			});
		});
	</script>
<?php include('footer.php'); ?>
