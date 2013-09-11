<?php

	require_once('class.phpmailer.php');

	$mail             = new PHPMailer(); // defaults to using php "mail()"

	$body             = "hi";

	// $mail->AddReplyTo("name@yourdomain.com","First Last");

	$mail->SetFrom('hompage', 'my homepage');

	// $mail->AddReplyTo("name@yourdomain.com","First Last");

	$address = "km.whelan93@gmail.com";
	$mail->AddAddress($address, "Kevin Whelan");

	$mail->Subject    = $_POST['from'] . " sent you a message from your homepage!";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	$mail->AddStringAttachment($_POST['dataURL'], 'propic', "base64", ".png");

	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}

?>