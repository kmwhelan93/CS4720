<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		echo json_encode(['success' => false, 'loggedin' => false, "id" => $id]);
	}
	$id = $_GET['id'];
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



	if ($stmt->prepare("UPDATE reminders set title=?, priority=?, notes=? where reminder_id=? and username=?")) {
		$stmt->bind_param('sssss', $title, $priority, $notes, $id, $username);
		if ($stmt->execute()) {
			echo json_encode(["success" => true, 'loggedin' => true, "id" => $id]);
		} else {
			echo json_encode(['success' => false, 'loggedin' => true, "id" => $id]);
		}
	}




?>