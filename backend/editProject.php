<?php
	include("connect.php");
	if($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}
	$projectID = $mysqli->real_escape_string($_POST["projectID"]);
	$newTitle = $mysqli->real_escape_string($_POST["newProjectTitle"]);
	$newDescription = $mysqli->real_escape_string($_POST["newProjectDescription"]);
	$sql="UPDATE PROJECT SET PROJECT_NAME='$newTitle', DESCRIPTION='$newDescription', LAST_EDITED_ON=NOW() WHERE PROJECT_ID='$projectID';";
	$mysqli->query($sql);
	$mysqli->close();
?>