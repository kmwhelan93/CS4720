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


	if ($stmt->prepare("DELETE FROM reminders WHERE reminder_id=?")) {
		$stmt->bind_param('s', $id);
		if ($stmt->execute()) {
			$arr = array("success" => true, 'loggedin' => true, "id" => $id);
			echo json_encode($arr);
		} else {
			$arr = array('success' => false, 'loggedin' => true, "id" => $id);
			echo json_encode($arr);
		}
	}




?>