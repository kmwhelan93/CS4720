<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$arr = array('success' => false);
		echo json_encode($arr);
	}
	$listItems = array();

	if ($stmt->prepare("SELECT reminder_id, title, notes, priority FROM reminders WHERE username=? and priority=?")) {
		$stmt->bind_param('ss', $_SESSION['username'], $_GET['priority']);
		$stmt->execute();
		$stmt->bind_result($id, $title, $notes, $priority);

		
		while ($stmt->fetch()) {
			$listItems[$id] = array('title' => $title, 'notes' => $notes, 'priority' => $priority);
		}
		$arr = array('success' => true, 'list_items' => $listItems);
		echo json_encode($arr);
	}
?>