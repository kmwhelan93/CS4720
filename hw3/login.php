<!DOCTYPE html>
<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
?>
<html>
<head>

	<!-- COMMON CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.css" />


	<!-- COMMON JS -->
	<script src="js/jquery-2.0.3.js"></script>
	
	<script src="js/bootstrap.js"></script>

	<script src="js/jquery-ui.js"></script>

	<link href="css/jquery-ui.css" rel="stylesheet">



	<!-- SPECIFIC JS & CSS -->
	<script type="text/javascript" src="js/login.js" async ></script>
	<link rel="stylesheet" href="css/login.css"/>

	<title>Kevin's Homepage</title>
	<meta charset="utf-8">


</head>
<body>
<div class="container">
	<form class="form-signin">
		<h2 class="form-signin-heading">Please sign in</h2>
		<input id="username" type="text" class="form-control" placeholder="Username" autofocus>
		<input id="password" type="password" class="form-control" placeholder="Password">
		<button id="submit-button" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<button id="switch-type" type="button" class="btn btn-link">New User?</button>
	</form>
</div> <!-- /container -->
</body>
</html>