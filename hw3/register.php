<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	include_once('dblogin.php');

	$username = $_POST['username'];
	$password = hash("md5", $_POST['password']);
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

	if (!$taken && $stmt2->prepare("INSERT INTO users2 (username, password) VALUES (?, ?)") or die(mysqli_error1)) {
		$stmt2->bind_param('ss', $username, $password);
		if ($stmt2->execute()) {
			$_SESSION['username'] = $username;
			$success = true;
		}
		$stmt2->close();
	}
	
	$db_connection->close();

	echo json_encode(['taken' => $taken,
						'success' => $success]);









?>