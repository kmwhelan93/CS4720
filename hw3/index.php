<?php

	if (!isset($_SESSION)) {
		// only start the session if it isn't already started
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		header( 'Location: login.php' ) ;
	}

	include_once('dblogin.php');
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
	<script type="text/javascript" src="js/index.js" async ></script>
	<link rel="stylesheet" href="css/index.css"/>

	<title>Reminders Application</title>
	<meta charset="utf-8">


</head>
<body>


<div class="navbar navbar-default">
<div class="navbar-collapse collapse">

<div class="navbar-header">
     <a class="navbar-brand" href="#">Reminder Application!</a>
</div>

  <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="./">Hi, <?php echo $_SESSION['username'] ?></a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>




<div class="container">

	<div class="list-group">
		<ul class="list-group">
			
      	</ul>

	 
	  
	</div>



</div>


<!-- Modal TODO fix how it opens a scroll bar -->
  <div class="modal fade" id="create-reminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Create Reminder</h4>
        </div>
        <div class="modal-body">
  

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






        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="create-button" type="button" class="btn btn-primary">Create</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</body>
</html>