<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die("Error: ".mysql_error ());
		
		date_default_timezone_set('EST');
		$date = date('Y/m/d');
		
		#TODO: Check if this is a valid date
		#if ($_GET["date"]) {
		#	$date = $_GET["date"];
		#}
		
		$day = date('w', strtotime($date)) + 1;
		
		echo("<h1>Roster List for " . $date . "</h1>");
?>



<table>
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Override?</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if ($_GET["teacherID"]) {
				#Grab all the Overrides for the students under this teacher, on this day
				#Combine it with the table with all of the regular Assigments for this weekday
				#Don't include Assignments that have an Override
				$query = "(SELECT Student.firstName AS firstName, Student.lastName AS lastName, Bus.driverName, Bus.name, Bus.busID, Bus.lineOrder AS lnOrder, Override.notes, 'Y' AS isOverride
							FROM Override
							JOIN Student ON Override.studentID = Student.id
							JOIN Bus ON Override.busID = Bus.busID
							WHERE Student.homeTeacherID = '$_GET[teacherID]' AND date = '$date')
						UNION
							(SELECT Student.firstName AS firstName, Student.lastName AS lastName, Bus.driverName, Bus.name, Bus.busID, Bus.lineOrder AS lnOrder, Assignment.notes, 'N' AS isOverride
								FROM Assignment
								JOIN Student ON Assignment.studentID = Student.id
								JOIN Bus ON Assignment.busID = Bus.busID
								JOIN Teacher ON Teacher.teacherID = Student.homeTeacherID
								WHERE Assignment.dayID = '" . $day . "' AND Teacher.teacherID = '" . $_GET['teacherID'] . "'
								AND NOT EXISTS
								(
									SELECT *
									FROM Override
									WHERE Override.studentID = Assignment.studentID AND Override.date = '$date'
								)
							)
							ORDER BY lnOrder, lastName, firstName";
				#echo($query);		
						
							
				$result = mysql_query($query, $conn) or die("Error: ".mysql_error());
				
				while($row = mysql_fetch_array($result)) {
					if ($row["isOverride"] == "Y") {
						echo("<tr class='highlight'>");
					} else {
						echo("<tr>");
					}
					echo(
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>");
					if ($row["busID"] != -1 && $row["busID"] != -8) {
						echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
					} else {
						echo("<td>" . $row["name"] . "</td>");
					}
					echo("<td>" . $row["isOverride"] . "</td>" .
						"<td>" . $row["notes"] . "</td>");
						
					echo("</tr>");
				}
			}
		?>
	</tbody>
</table>