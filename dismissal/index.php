<?php include("templates/header.php"); ?>
<html>
<head>
	<title>Dashboard Home</title>
</head>
<body>
	<h2>Reports</h2>
	<ul>
		<li><a href="reports/studentView.php">Student Report</a></li>
		<li><a href="reports/dayTeacherView.php">Individual Teacher Report</a></li>
		<li><a href="reports/allTeacherView.php">Collective Teacher Report</a></li>
		<li><a href="reports/dayBusView.php">Bus Report</a></li>
		<li><a href="reports/editAssignments.php">Edit Assignments</a></li>
		<li><a href="reports/addOverride.php">Add an override</a></li>
		<li><a href="controllers/Override/delete.php">Delete overrides</a></li>
		<li><a href="reports/showOverrides.php">See all overrides</a></li>
	</ul>
	<a href="admin.php">Link to Admin Page</a>
</body>
</html>
<?php include("templates/footer.php"); ?>