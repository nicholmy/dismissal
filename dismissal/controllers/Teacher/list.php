<table>
    <tr>
			<th>Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus Line Name</th>
    </tr>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
		
		$query = "SELECT * FROM Teacher";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["teacherID"] . "</td>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>" .
						"<td>" . $row["lineName"] . "</td>" .
				 "</tr>");
		}
	?>
</table>