<?php include('header.php') ?>
	<div data-role="page" data-theme="b" data-dialog="true" data-close-btn="off" id="start">
		<div data-role="header">
			<h1>Chat App</h1>
		</div>
		<div data-role="content" class="ui-content">
			<h2>Welcome to the chat app</h2>
			<p>Here you can chat for free with random people</p>
			<a href="#auth" data-transition="pop" data-role="button">Join Us</a>
		</div>
		<div data-role="footer">
			<h1>&nbsp;</h1>
		</div>
	</div>
	<div data-role="page" data-theme="b" data-dialog="true" data-close-btn="right" id="auth">
		<div data-role="header">
			<h1>Chat app</h1>
		</div>
		<div data-role="content" class="ui-content">
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#login" data-transition="pop" data-role="button">
						Login
					</a>
				</div>
				<div class="ui-block-b">
					<a href="#registration" data-transition="pop" data-role="button">
						Register
					</a>
				</div>
			</div>
		</div>
		<div data-role="footer">
			<h1>&nbsp;</h1>
		</div>
	</div>
	<div data-role="page" data-theme="b" data-dialog="true" id="registration" data-close-btn="right">
		<div data-role="header">
			<h1>Register</h1>
		</div>
		<div data-role="content" class="ui-content">
			<form method="POST" action="scripts/createUser.php" id="reg_form">
				<label for="username">Username</label>
				<input type="text" name="user" id="username" placeholder="Username..." autocomplete="off" maxlength="20" required>
				<label for="password">Password</label>
				<input type="password" name="pass" id="password" placeholder="Password..." maxlength="20" required>
				<input type="submit" value="Register" />
			</form>
		</div>
		<div data-role="footer">
			<h1>&nbsp;</h1>
		</div>
	</div>
	<div data-role="page" data-theme="b" data-dialog="true" id="login" data-close-btn="right">
		<div data-role="header">
			<h1>Login</h1>
		</div>
		<div data-role="content" class="ui-content">
			<form method="POST" action="scripts/loginUser.php" id="login_form">
				<label for="username_login">Username</label>
				<input type="text" name="user" id="username_login" placeholder="Username..." autocomplete="off" maxlength="20" required>
				<label for="password_login">Password</label>
				<input type="password" name="pass" id="password_login" placeholder="Password..." maxlength="20" required>
				<input type="submit" value="Login" />
			</form>
		</div>
		<div data-role="footer">
			<h1>&nbsp;</h1>
		</div>
	</div>
	<div data-role="page" data-theme="b" id="home">
		<div data-role="header">
			<a href="#start" class="ui-btn ui-corner-all ui-btn-inline ui-mini footer-button-right ui-btn-icon-left ui-icon-back">
				Go Back
			</a>
			<h1 id="name"></h1>
		</div>
		<div data-role="content" class="ui-content chat">
			<div class="ui-grid-solo ui-content chatview">
				<p id="chat-area"></p>
				<form method="POST" action="scripts/writeMessage.php" id="writemsg_form">
					<legend>Type your message:</legend>
					<input type="text" name="usermsg" placeholder="Write message..." autocomplete="off" maxlength="50" required/>
					<input type="submit" value="Send message" />
					<input type="hidden" value="" name="getname" />
				</form>
			</div>
			<div class="ui-grid-solo ui-content error">
				<h1 style="color: #FFF;">Please log in to visit the chat</h1>
			</div>
		</div>
		<div data-role="footer" data-position="fixed" class="ui-bar">
			<h1>Created by: Daniel Iliev</h1>
		</div>
	</div>
<?php include('footer.php'); ?>
