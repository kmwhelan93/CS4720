<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$arr = array('success' => false, 'loggedin' => false, "title" => $title);
		echo json_encode($arr);
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
			$arr = array("success" => true, 'loggedin' => true, "title" => $title);
			echo json_encode($arr);
		} else {
			$arr = array('success' => false, 'loggedin' => true, "title" => $title);
			echo json_encode($arr);
		}
	}




?>