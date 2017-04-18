<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Add Student</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["firstName"] && $_POST["lastName"] && $_POST[busID] && $_POST[homeTeacherID]) {
				$query = "INSERT INTO Student(firstName, lastName, busID, homeTeacherID) VALUES( \"$_POST[firstName]\", \"$_POST[lastName]\", $_POST[busID], $_POST[homeTeacherID])";
				 
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error () . "<br />Query: " . $query);
				} else {
					echo("Student added successfully!");
					$sid = mysql_insert_id($conn);
					
					for ($day = 2; $day <= 6; $day++) {
						$query2 = "INSERT INTO Assignment(dayID, studentID, firstName, lastName, busID, notes) 
								VALUES($day, $sid, \"$_POST[firstName]\", \"$_POST[lastName]\", \"$_POST[busID]\", \"\")";
								
						$result = mysql_query($query2, $conn) or die("Error: ".mysql_error());
					}
					echo("<br />Assignments for the week added successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Student</h1>
		<form name="input" action="add.php" method="post">
			<table>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="firstName"></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lastName"></td>
				</tr>
				<tr>
					<td>Bus:</td>
					<td><select name="busID"><?php include("../Bus/options.php"); ?></select></td>
				</tr>
				<tr>
					<td>Home Teacher:</td>
					<td><select name="homeTeacherID"><?php include("../Teacher/options.php"); ?></select></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>