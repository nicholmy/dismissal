<?php
	#Connect to MYSQL
	$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
	

	$query = "SELECT * FROM Bus ORDER BY lineOrder";
	
	$rs = mysql_query($query, $conn);
	
	echo("<option value=''></option>");
	while($row = mysql_fetch_array($rs)) {
		echo("<option value='" . $row["busID"] . "'>");
		if ($row["busID"] != -1 && $row["busID"] != -2) {
			echo($row["busID"] . " - " . $row["name"] . " - " . $row["driverName"]);
		} else {
			echo($row["name"]);
		}
		echo("</option>");
	}
?>