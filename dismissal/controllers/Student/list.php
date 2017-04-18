<table id="studentTable" class="center">
	<thead>
		<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Home Teacher</th>
		</tr>
	</thead>
	<tbody>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die("Error: ".mysql_error($conn));
		
		$query = "SELECT Student.id, Student.lastName, Student.firstName, Teacher.lastName AS teacher FROM Student JOIN Teacher ON Student.homeTeacherID = Teacher.teacherID ORDER BY Student.lastName, Student.firstName";
		
		$result = mysql_query($query, $conn) or die("Error: ".mysql_error($conn));
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>" .
						"<td>" . $row["teacher"] . "</td>" .
				 "</tr>");
		}
	?>
	</tbody>
</table>