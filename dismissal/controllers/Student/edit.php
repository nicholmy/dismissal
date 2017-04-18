<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Edit Student</title>
</head>
<body>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
		
		if ($_POST["studentID"]) {
			$query = "";
			if ($_POST["lastName"]) {
				$query = "UPDATE Student SET lastName = '" . $_POST['lastName'] . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the student: '.mysql_error($conn));
			
				echo("Last name updated successfully!<br />");
			}
			
			if ($_POST["firstName"]) {
				$query = "UPDATE Student SET firstName = '" . $_POST['firstName'] . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the day.'.mysql_error($conn));
			
				echo("First name updated successfully! <br />");
			}
			
			if ($_POST["homeTeacherID"]) {
				$query = "UPDATE Student SET homeTeacherID = '" . $_POST['homeTeacherID'] . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the bus.'.mysql_error($conn));
			
				echo("Home teacher updated successfully! <br />");
			}
		} else {
			echo("Invalid Assignment ID. Please hit back on your browser and try again.");
		}
	?>
	<a href="../../reports/editStudents.php">Edit more students</a>
</body>
</html>
<?php include("../../templates/footer.php"); ?>