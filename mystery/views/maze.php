
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


	<!-- SPECIFIC JS & CSS -->
	<script type="text/javascript" src="js/maze.js" async ></script>

	

	<title>Reminders Application</title>
	<meta charset="utf-8">


</head>
<body>


	<div class="navbar navbar-default">
	<div class="navbar-collapse collapse">

	<div class="navbar-header">
	     <a class="navbar-brand" href="index">Sam's Scavenger Hunt!</a>
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
  <div class="container">
	<label for="answer">Maze answer</label>
    <input class="form-control" id="answer" placeholder="Enter answer to maze here">
    <button type="submit" id="submit" class="btn btn-default">Submit</button>
    <div id = "response"></div>
</div>

</div> <!-- /container -->
</body>
</html>
