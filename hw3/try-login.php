<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	include_once('dblogin.php');

	$username = $_GET['username'];
	$password = hash("md5", $_GET['password']);


	if ($stmt->prepare("SELECT * FROM `users2` WHERE username=? and password=?") or die(mysqli_error1)) {
		$stmt->bind_param('ss', $username, $password);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		if ($stmt->fetch()) {
			$_SESSION['username'] = $username;
			$arr = array('success' => true);
			echo json_encode($arr);
		} else {
			$arr = array('success' => false);
			echo json_encode($arr);
		}
	}

	$stmt->close();
	$db_connection->close();








?>