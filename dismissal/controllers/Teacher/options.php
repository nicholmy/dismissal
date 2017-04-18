<?php
	#Connect to MYSQL
	$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
	

	$query = "SELECT * FROM Teacher ORDER BY lastName, firstName";
	
	$rs = mysql_query($query, $conn);
	
	echo("<option value=''></option>");
	while($row = mysql_fetch_array($rs)) {
		echo("<option value='" . $row["teacherID"] . "'>" . $row["lastName"] . ", " . $row["firstName"] . "</option>");
	}
?>