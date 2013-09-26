<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		echo json_encode(['success' => false, 'loggedin' => false, "title" => $title]);
	}
	$title = $_GET['title'];
	$notes = "";
	$priority = 2;
	$username = $_SESSION['username'];
	if (isset($_GET['notes'])) {
		$notes = $_GET['notes'];
	}
	if (isset($_GET['priority'])) {
		$priority = $_GET['priority'];
	}


	if ($stmt->prepare("INSERT INTO reminders (username, title, notes, priority) VALUES (?, ?, ?, ?)")) {
		$stmt->bind_param('ssss', $username, $title, $notes, $priority);
		if ($stmt->execute()) {
			echo json_encode(["success" => true, 'loggedin' => true, "title" => $title]);
		} else {
			echo json_encode(['success' => false, 'loggedin' => true, "title" => $title]);
		}
	}




?>