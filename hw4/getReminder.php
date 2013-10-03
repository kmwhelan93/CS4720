<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$arr = array('success' => false);
		echo json_encode($arr);
		die();
	}

	if ($stmt->prepare("SELECT reminder_id, title, notes, priority FROM reminders WHERE username=? and reminder_id=?")) {
		$stmt->bind_param('ss', $_SESSION['username'], $_GET['id']);
		$stmt->execute();
		$stmt->bind_result($id, $title, $notes, $priority);

		
		if ($stmt->fetch()) {
			$reminder = array('title' => $title, 'notes' => $notes, 'priority' => $priority);
		} else {
			$arr = array('success' => false);
			echo json_encode($arr);
			die();
		}
		$arr = array('success' => true, 'reminder' => $reminder);
		echo json_encode($arr);
	}
?>