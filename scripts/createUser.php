<?php
	include_once('db.php');

	$username = $_POST['user'];
	$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$databaseInstance->Connect();
	$databaseInstance->InsertUser($username, $password);
	unset($databaseInstance);
?>
