<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	include_once('dblogin.php');

	$username = $_GET['username'];
	$password = hash("md5", $_GET['password']);
	$taken = false;
	$success = false;
	/*
	if ($stmt->prepare("SELECT * FROM `users2` WHERE username=?" ) or die(mysqli_error1)) {
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		if ($stmt->fetch()) {
			// if username is already taken
		} else {
			$taken = false;
		}
		$stmt->close();
	}
	
	*/
	$stmt2 = $db_connection->stmt_init();

	if (!$taken && $stmt2->prepare("INSERT INTO users (username, password, level) VALUES (?, ?, 1)") or die(mysqli_error1)) {
		$stmt2->bind_param('ss', $username, $password);
		if ($stmt2->execute()) {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = $username;
			$success = true;
		}
		$stmt2->close();
	}
	
	$db_connection->close();
	$arr = array('taken' => $taken,
						'success' => $success);
	echo json_encode($arr);









?>