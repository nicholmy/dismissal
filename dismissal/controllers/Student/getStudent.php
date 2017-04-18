<?php
	#Connect to MYSQL
	$conn = @mysql_connect("localhost", "kippgast_mnichol", "Yumyum92!!!");
	
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
	
	if ($_GET["studentID"]) {
		$query = "SELECT * FROM Student WHERE id = " . $_GET['studentID'];
		
		$result = mysql_query($query, $conn) or die('Error!');
		
		while($row = mysql_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>