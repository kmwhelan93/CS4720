<?php
	$guess = $_GET["guess"];
	$message = "";
	$number = 56;
	if ($guess == $number) {
		$message = "YOU GOT IT!!!!!!!!!! WOOOHOOOO!!!!";
		$response = array("message"=> $message, "correct"=> true);
		echo json_encode($response);
	}
	else {
		$rand = rand(0, 4);
		if ($rand == 0) {
			$message = "WRONG!";
		} else if ($rand == 1) {
			$message = "KEEP GUESSING!!!!!";
		} else if ($rand == 2) {
			$message = "better luck next time";
		} else if ($guess < $number) {
			$message = "HIGHER!";
		} else if ($guess > $number) {
			$message = "LOWER!";
		}
		
		$response = array("message"=> $message, "correct"=> false);
		echo json_encode($response);
	}



?>