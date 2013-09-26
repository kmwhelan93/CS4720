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


	if ($stmt->prepare("DELETE FROM reminders WHERE reminder_id=?")) {
		$stmt->bind_param('s', $id);
		if ($stmt->execute()) {
			echo json_encode(["success" => true, 'loggedin' => true, "id" => $id]);
		} else {
			echo json_encode(['success' => false, 'loggedin' => true, "id" => $id]);
		}
	}




?>