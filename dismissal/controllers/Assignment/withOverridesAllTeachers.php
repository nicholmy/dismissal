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
		
		#TODO: Use a query to get the actual IDs
		#for ($tID = 1; $tID <= 23; $tID++) {
		$query = "SELECT * FROM Teacher";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($trow = mysql_fetch_array($result)) {
			echo("<div class=\"page\">
			<h1>" . $date . " Roster List for " . $trow["firstName"] . " " . $trow["lastName"] . "</h1>");
			
			echo ("<table>
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Bus</th>
							<th>Override?</th>
							<th>Notes</th>
						</tr>
					</thead>
					<tbody>");
			$id = $trow["teacherID"];
			#Grab all the Overrides for the students under this teacher, on this day
			#Combine it with the table with all of the regular Assigments for this weekday
			#Don't include Assignments that have an Override
			$query2 = "(SELECT Student.firstName AS firstName, Student.lastName AS lastName, Bus.driverName, Bus.name, Bus.busID, Bus.lineOrder AS lnOrder, Override.notes, 'Y' AS isOverride
							FROM Override
							JOIN Student ON Override.studentID = Student.id
							JOIN Bus ON Override.busID = Bus.busID
							WHERE Student.homeTeacherID = '$id' AND date = '$date')
						UNION
							(SELECT Student.firstName AS firstName, Student.lastName AS lastName, Bus.driverName, Bus.name, Bus.busID, Bus.lineOrder AS lnOrder, Assignment.notes, 'N' AS isOverride
								FROM Assignment
								JOIN Student ON Assignment.studentID = Student.id
								JOIN Bus ON Assignment.busID = Bus.busID
								JOIN Teacher ON Teacher.teacherID = Student.homeTeacherID
								WHERE Assignment.dayID = '" . $day . "' AND Teacher.teacherID = '" . $id . "'
								AND NOT EXISTS
								(
									SELECT *
									FROM Override
									WHERE Override.studentID = Assignment.studentID AND Override.date = '$date'
								)
							)
							ORDER BY lnOrder, lastName, firstName";
			#echo($query);		
					
						
			$result2 = mysql_query($query2, $conn) or die("Error: ".mysql_error());
			
			while($row = mysql_fetch_array($result2)) {
				if ($row["isOverride"] == "Y") {
					echo("<tr class='highlight'>");
				} else {
					echo("<tr>");
				}
				echo("<td>" . $row["firstName"] . "</td>" .
					"<td>" . $row["lastName"] . "</td>");
					if ($row["busID"] != -1 && $row["busID"] != -8) {
						echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
					} else {
						echo("<td>" . $row["name"] . "</td>");
					}
				echo("<td>" . $row["isOverride"] . "</td>" .
					"<td>" . $row["notes"] . "</td>" .
				 "</tr>");
			}
					
			echo("	</tbody>
				</table></div>");
		} 

?>