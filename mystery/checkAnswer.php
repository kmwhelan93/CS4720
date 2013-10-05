<?php
	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		header("Location: login");
		die();
	}
	$message = "";
	$answer = $_GET['answer'];
	if (strtolower($answer) == 'kevin is so awesome and cool. truth.') {
		echo "The next clue is behind the amphitheater. That is, go behind the stage and it is on the wall behind.";
		$message = "success";
	} else {
		echo "WRONG. Oh noes!";
		$message = "fail";
	}

?>