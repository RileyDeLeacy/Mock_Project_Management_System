<?php
	include("connect.php");
	if($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}
	$sql="SELECT PROJECT_ID, PROJECT_ID, PROJECT_NAME, DESCRIPTION, LAST_EDITED_ON FROM project WHERE COMPLETED=0;";
	$result = $mysqli->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo "<div class='projectoccurance'>";
			echo "<h1>".$row["PROJECT_NAME"]."</h1>";
			echo "<p>Project ID:".$row["PROJECT_ID"]."</p>";
			echo "<p>".$row["DESCRIPTION"]."</p>";
			echo "<p>Last Edited:".$row["LAST_EDITED_ON"]."</p>";
			echo "<button id='".$row["PROJECT_ID"]."' onmousedown='completeClicked(this.id)'>Completed</button>";
			echo "</div>";
		}
	}else{
		echo "No Completed Projects";
	}
	$mysqli->close();
?>