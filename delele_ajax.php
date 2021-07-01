<?php
include 'dbConnection.php';
	$title=$_POST['title'];
	$sql = "DELETE FROM `list` WHERE title=$title";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>