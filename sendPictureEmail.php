<?php

	require_once('class.phpmailer.php');

	$mail             = new PHPMailer(); // defaults to using php "mail()"

	$body             = "hi";

	$mail->AddReplyTo("name@yourdomain.com","First Last");

	$mail->SetFrom('name@yourdomain.com', 'First Last');

	$mail->AddReplyTo("name@yourdomain.com","First Last");

	$address = "km.whelan93@gmail.com";
	$mail->AddAddress($address, "John Doe");

	$mail->Subject    = "PHPMailer Test Subject via mail(), basic";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}
    
















	$to = "km.whelan93@gmail.com";
	$subject = "Someone drew a photo of you!";
	$from = "km.whelan93@gmail.com";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:" . $_POST["from"] . "\r\n";
	$theMessage="<html>
	<body>
		" . $_POST["dataURL"] . "
	</body>
	</html>
	";
	mail($to,$subject,$theMessage,$headers);
	echo "hi";
	echo $_POST['dataURL'];


?>