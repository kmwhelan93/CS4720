
<?php 
	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	$loggedIn = true;
	if (!isset($_SESSION['username'])) {
		$loggedIn = false;
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



	

	<title>Reminders Application</title>
	<meta charset="utf-8">


</head>
<body>


	<div class="navbar navbar-default">
	<div class="navbar-collapse collapse">

	<div class="navbar-header">
	     <a class="navbar-brand" href="reminders">Reminder Application!</a>
	</div>

	  <ul class="nav navbar-nav navbar-right">
	  	<?php 
    		if ($loggedIn) {
		    	echo '<li class="active"><a href="./">Hi, ' . $_SESSION['username'] . '</a></li>';
		    	echo '<li><a href="logout.php">Log out</a></li>';
		    } else {
		    	echo '<li><a href="login">Log in / Register</a></li>';
		    }
    	?>
	  </ul>
	</div><!--/.nav-collapse -->
	</div>

  <!-- Main component for a primary marketing message or call to action -->
  <div class="container">
  <div class="jumbotron">
    <h1><?php 
    if ($loggedIn) {
    	echo "Welcome, " . $_SESSION['username'];
    } else {
    	echo "Welcome to Reminders!";
    }


     ?></h1>
     <p>
     	<?php 
	    if ($loggedIn) {
	    	echo "We're glad to see you back!";
	    } else {
	    	echo "A sweet application to manage all your planning and prioritization.";
	    }


     ?>
     </p>
    <p>
    	<a class="btn btn-lg btn-primary" href="
    	<?php 
    		if ($loggedIn) {
		    	echo "reminders";
		    } else {
		    	echo "login" ;
		    }
    	?>
      ">
  		<?php 
    		if ($loggedIn) {
		    	echo "View Your Reminders";
		    } else {
		    	echo "Log in / Register";
		    }
    	?>
    </a>

    <a class="btn btn-lg btn-default" href="users">View List of users</a>
    </p>
  </div>

</div> <!-- /container -->
</body>
</html>