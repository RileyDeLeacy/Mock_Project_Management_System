<?php
	include("connect.php");
	if($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}
	$projectID = $mysqli->real_escape_string($_POST["completeId"]);
	$sql="UPDATE PROJECT SET COMPLETED=0, LAST_EDITED_ON=NOW() WHERE PROJECT_ID='$projectID';";
	$mysqli->query($sql);
	$mysqli->close();
?>