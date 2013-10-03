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
    <li class="active"><a href="./">Hi, <?php echo $_SESSION['username'] ?></a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>




<div class="container">
	<table class="table table-striped">
  		<tr><th>List of users</th></tr>
  		<?php

			include_once('dblogin.php');

			if ($stmt->prepare("SELECT username FROM `users2`") or die(mysqli_error1)) {
				$stmt->execute();
				$stmt->bind_result($username);
				while ($stmt->fetch()) {
					echo "<tr><td>$username</td></tr>";
				} 
			}

			$stmt->close();
			$db_connection->close();








		?>
	</table>
</div>
</body>
</html>