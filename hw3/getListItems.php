<?php
	include_once 'dblogin.php';

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		echo json_encode(['success' => false]);
	}
	$listItems = array();

	if ($stmt->prepare("SELECT reminder_id, title, notes, priority FROM reminders WHERE username=?")) {
		$stmt->bind_param('s', $_SESSION['username']);
		$stmt->execute();
		$stmt->bind_result($id, $title, $notes, $priority);

		
		while ($stmt->fetch()) {
			$listItems[$id] = ['title' => $title, 'notes' => $notes, 'priority' => $priority];
		}

		echo json_encode(['success' => true, 'list_items' => $listItems]);
	}
?>