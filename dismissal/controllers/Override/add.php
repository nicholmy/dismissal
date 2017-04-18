<?php
	#Connect to MYSQL
	$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die("Error: ".mysql_error ());
	
	if($_POST["studentID"] && $_POST["date"] && $_POST["busID"]) {
		$query = "INSERT INTO Override(date, studentID, busID) VALUES('$_POST[dateID]', '$_POST[studentID]', '$_POST[busID]')";
		
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error ());
		} else {
			echo("Database updated successfully!<br />");
		}
	} else {
		echo("Missing student, date, or bus information");
	}
?>