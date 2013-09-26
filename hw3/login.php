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

	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">



	<!-- SPECIFIC JS & CSS -->
	<script type="text/javascript" src="js/login.js" async ></script>
	<link rel="stylesheet" href="css/login.css"/>

	<title>Kevin's Homepage</title>
	<meta charset="utf-8">


</head>
<body>
<div class="container">
	<div class="form-signin">
		<h2 class="form-signin-heading">Please sign in</h2>
		<input id="username" type="text" class="form-control" placeholder="Username" autofocus>
		<input id="password" type="password" class="form-control" placeholder="Password">
		<button id="submit-button" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<button id="switch-type" type="button" class="btn btn-link">New User?</button>
	</div>
</div> <!-- /container -->
</body>
</html>