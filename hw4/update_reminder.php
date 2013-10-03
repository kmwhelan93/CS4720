<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$arr = array('success' => false, 'loggedin' => false, "id" => $id);
		echo json_encode($arr);
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
			$arr = array("success" => true, 'loggedin' => true, "id" => $id);
			echo json_encode($arr);
		} else {
			$arr = array('success' => false, 'loggedin' => true, "id" => $id);
			echo json_encode($arr);
		}
	}




?>