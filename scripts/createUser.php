<?php
	include_once('db.php');

	$username = $_POST['user'];
	$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$createUser = new DatabaseUsage($conf['host'], $conf['username'], $conf['password'], $conf['dbname']);
	$createUser->Connect();
	$createUser->InsertUser($username, $password);
	unset($createUser);
?>
