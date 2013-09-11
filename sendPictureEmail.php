<?php
	$to = "km.whelan93@gmail.com";
	$subject = "Someone drew a photo of you!";
	$from = "km.whelan93@gmail.com";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:" . $_GET["from"] . "\r\n";
	$theMessage="<html>
	<body>
		" . $_GET["dataURL"] . "
	</body>
	</html>
	";
	mail($to,$subject,$theMessage,$headers);
	echo "hi";


?>