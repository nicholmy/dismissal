<table>
    <tr>
			<th>First Name</th>
			<th>Last Name</th>
    </tr>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
		
		#date_default_timezone_set('EST');
		#$date = date('Y/m/d');
		
		#TODO: Check if this is a valid date
		#if ($_GET["date"]) {
		#	$date = $_GET["date"];
		#}
		
		#$day = date('w', strtotime($date)) + 1;
		
		if ($_GET["busID"] && $_GET["dayID"]) {
			$query = "SELECT Student.firstName, Student.lastName
						FROM Assignment
						JOIN Day ON Day.id = Assignment.dayID
						JOIN Student ON Assignment.studentID = Student.id
						JOIN Bus ON Assignment.busID = Bus.busID
						WHERE Bus.busID = '$_GET[busID]' AND Day.id = '$_GET[dayID]'
						ORDER BY Student.lastName, Student.firstName";
			
			$result = mysql_query($query, $conn) or die("Error: ".mysql_error());
			
			while($row = mysql_fetch_array($result)) {
				echo("<tr>" .
							"<td>" . $row["firstName"] . "</td>" .
							"<td>" . $row["lastName"] . "</td>
					  </tr>");
			}
		}
	?>
</table>