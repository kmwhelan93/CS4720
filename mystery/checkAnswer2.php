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

	$compid = 'kmw8sf';
	$receiverID = 'kmw8sf';
	$name = $_SESSION['username'];
	$message = str_replace(array("\r\n", "\r", "\n"), '<br/>', $message);
	
	
	
	//Send an email
	$to = "$receiverID@virginia.edu";
	$subject = "$name submitted an answer!";
	$from = "TutorMe <tutormeuva@gmail.com>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:" . $from . "\r\n" .
    'Reply-To: ' . $compid . '@virginia.edu';
	$theMessage="<html>
	<body>
		<h1 style=\"text-align:center;color:#193356\">$name sent you a message on TutorMe!</h1>
		<br>
		<hr style=\"width:80%;color:#EDEDED;background-color:#EDEDED\">
		<p style=\"text-align:center\">$message</p>
		<hr style=\"width:80%;color:#EDEDED;background-color:#EDEDED\">
		<br>
	</body>
	</html>
	";
	mail($to,$subject,$theMessage,$headers);
?>