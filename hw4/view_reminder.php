<!DOCTYPE html>
<!-- view_reminder.php -->
<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		header("Location: login");
		die();
	}

?>
<html>
<head>

	<!-- COMMON CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.css" />
	<link rel="stylesheet" href="../../css/bootstrap-theme.css" />


	<!-- COMMON JS -->
	<script src="../../js/jquery-2.0.3.js"></script>
	
	<script src="../../js/bootstrap.js"></script>

	<script src="../../js/jquery-ui.js"></script>

	<link href="../../css/jquery-ui.css" rel="stylesheet">



	<!-- SPECIFIC JS & CSS -->
	<script src="../../js/view_reminder.js"></script>

	<title>Reminders Application</title>
	<meta charset="utf-8">


</head>
<body>


<div class="navbar navbar-default">
<div class="navbar-collapse collapse">

<div class="navbar-header">
     <a class="navbar-brand" href="../../reminders">Reminder Application!</a>
</div>

  <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="./">Hi, <?php echo $_SESSION['username'] ?></a></li>
    <li><a href="../../logout.php">Logout</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>




<div class="container">

	<div class="list-group">
		<ul class="list-group">
			
      	</ul>

	 
	  
	</div>



</div>

	<div id="not_found" style="display:none">This is not a valid reminder id</div>
	<span id="reminder_id" style="display:none"><?php echo $id; ?></span>
        	<form role="form">
			  <div class="form-group">
			    <label for="input-title">Title</label>
			    <input class="form-control" id="input-title" placeholder="">
			  </div>

			  <div class="form-group">
			    <label for="input-priority">Priority: <span id="priority-value">2</span></label>
			    <div class="form-control" id="input-priority"></div>
			  </div>
			  
			  <div class="form-group">
			    <label for="input-notes">Notes</label>
			    <textarea class="form-control" id="input-notes" rows="4"></textarea>
			  </div>
			</form>
			 <button id="update-button" type="button" class="btn btn-primary">Update</button>



</body>
</html>