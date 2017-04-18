<?php
	#Connect to MYSQL
	$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
	

	$query = "SELECT * FROM Day";
	
	$rs = mysql_query($query, $conn);
	
	while($row = mysql_fetch_array($rs)) {
		echo("<input type='checkbox' name='dayIDs[]' value='" . $row["id"] . "' />" . $row["name"] . "<br />");
	}
?>