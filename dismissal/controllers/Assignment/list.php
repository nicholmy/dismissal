<table>
    <tr>
			<th>ID</th>
			<th>Day</th>
			<th>Student ID</th>
			<th>Bus ID</th>
    </tr>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("localhost", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die("Error: ".mysql_error());
		
		$query = "SELECT * FROM Assignment";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["id"] . "</td>" .
						"<td>" . $row["dayID"] . "</td>" .
						"<td>" . $row["studentID"] . "</td>" .
						"<td>" . $row["busID"] . "</td>" .
				 "</tr>");
		}
	?>
</table>