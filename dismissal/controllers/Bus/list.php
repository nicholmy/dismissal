<table>
    <tr>
			<th>busID</th>
			<th>Name</th>
			<th>lineName</th>
			<th>lineOrder</th>
			<th>driverName</th>
    </tr>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("localhost", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
		
		$query = "SELECT * FROM Bus";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["busID"] . "</td>" .
						"<td>" . $row["name"] . "</td>" .
						"<td>" . $row["lineName"] . "</td>" .
						"<td>" . $row["lineOrder"] . "</td>" .
						"<td>" . $row["driverName"] . "</td>" .
				 "</tr>");
		}
	?>
</table>