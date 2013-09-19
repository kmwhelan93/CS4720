<?php
	include_once('dblogin.php');

	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);

	if (mysqli_connect_error()) {
		echo "Can't connect!";
		return null;
	}


	$min = $_GET['min'];
	$max = $_GET['max'];



	$stmt = $db_connection->stmt_init();

	if ($stmt->prepare("SELECT deptID, courseNum, courseName, semester, seatsTaken FROM section WHERE seatsTaken >= ? and seatsTaken <= ? ORDER BY deptID ASC, courseNum ASC")) {
		// set parameters
		$stmt->bind_param("ss", $min, $max);

		// run the query
		$stmt->execute();

		// bind the result
		$stmt->bind_result($deptId, $courseNum, $courseName, $semester, $seatsTaken);

		// fetch the rows
		while ($stmt->fetch()) {
			echo $deptId . " " . $courseNum . " " . $courseName . " " . $semester . " " . $seatsTaken . "<br>";
		}
	}
	$stmt->close();
	$db_connection->close();

?>