<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Edit Assignment</title>
</head>
<body>
	<?php
		#Connect to MYSQL
		$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
		
		#Select the database
		$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
		
		if ($_POST["applyAll"] && $_POST["studentID"] && $_POST["busID"]) {
			$query = "UPDATE Assignment SET busID = '" . $_POST['busID'] . "' WHERE studentID = '" . $_POST['studentID'] . "';";
			
			$result = mysql_query($query, $conn) or die('Error setting the entire week for student: '.mysql_error($conn));
			echo("The entire week was updated successfully!");
		}
		
		else if ($_POST["assignmentID"]) {
			$query = "";
			if ($_POST["studentID"]) {
				$query = "UPDATE Assignment SET studentID = '" . $_POST['studentID'] . "' WHERE id = '" . $_POST['assignmentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the student: '.mysql_error($conn));
			
				echo("Student updated successfully!<br />");
			}
			
			if ($_POST["dayID"]) {
				$query = "UPDATE Assignment SET dayID = '" . $_POST['dayID'] . "' WHERE id = '" . $_POST['assignmentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the day.'.mysql_error($conn));
			
				echo("Day updated successfully! <br />");
			}
			
			if ($_POST["busID"]) {
				$query = "UPDATE Assignment SET busID = '" . $_POST['busID'] . "' WHERE id = '" . $_POST['assignmentID'] . "';";
			
				$result = mysql_query($query, $conn) or die('Error setting the bus.'.mysql_error($conn));
			
				echo("Bus updated successfully! <br />");
			}
		} else {
			echo("Invalid Assignment ID. Please hit back on your browser and try again.");
		}
	?>
	<a href="../../reports/editAssignments.php">Edit more assignments</a>
</body>
</html>
<?php include("../../templates/footer.php"); ?>