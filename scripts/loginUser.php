<?php
	include_once('db.php');

	$username = $_POST['user'];
	$password = $_POST['pass'];
	$databaseInstance->Connect();
	$databaseInstance->LoginUser($username, $password);
	unset($databaseInstance);
?>
