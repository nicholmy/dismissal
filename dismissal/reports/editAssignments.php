<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Edit Assignments</title>
	<script type="text/javascript" src="../js/editAssignments.js"></script>
</head>
<body>
	<form action="../controllers/Assignment/edit.php" method="post">
		<table>
			<tr>
				<td>Assignment:</td>
				<td>
					<select id="assignmentID" name="assignmentID">
						<?php include("../controllers/Assignment/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>Student:</td>
				<td>
					<select id="studentID" name="studentID">
						<?php include("../controllers/Student/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>Day:</td>
				<td>
					<select id="dayID" name="dayID">
						<?php include("../controllers/Day/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>Bus:</td>
				<td>
					<select id="busID" name="busID">
						<?php include("../controllers/Bus/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="checkbox" name="applyAll" value="1">Apply to the whole week<br>
				</td>
			</tr>
		</table>
		<input type="submit" value="Save New Changes" />
	</form>
	<div id="table"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>