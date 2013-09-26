<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}

	unset($_SESSION['username']);
	header( 'Location: login.php' ) ;
?>