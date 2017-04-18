<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Edit Students</title>
	<script type="text/javascript" src="../js/editStudents.js"></script>
</head>
<body>
	<h1>Edit Student</h1>
	<form action="../controllers/Student/edit.php" method="post">
		<table>
			<tr>
				<td>Student:</td>
				<td>
					<select id="studentID" name="studentID">
						<?php include("../controllers/Student/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>First Name</td>
				<td>
					<input type="text" name="firstName" id="firstName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>
					<input type="text" name="lastName" id="lastName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Home Teacher</td>
				<td>
					<select id="homeTeacherID" name="homeTeacherID">
						<?php include("../controllers/Teacher/options.php"); ?>
					</select> <br />
				</td>
			</tr>
		</table>
		<input type="submit" value="Save New Changes" />
	</form>
	<div id="table"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>