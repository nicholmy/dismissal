<?php include("templates/header.php"); ?>
<html>
<head>
	<script type="text/javascript" src="index.js"></script>
</head>
<body>
	<div id="main">
		<h2>Bus Assignments</h2>
		<ul>
			<li><a href="controllers/Assignment/add.php">Add</a></li>
			<li><a href="reports/editAssignments.php">Edit</a></li>
			<li><a href="controllers/Assignment/list.php">List</a></li>
			<li><a href="controllers/Assignment/delete.php">Delete</a></li>
		</ul>
		<h2>Bus Overrides</h2>
		<ul>
			<li><a href="controllers/Override/delete.php">Delete</a></li>
		</ul>
		<h2>Bus</h2>
		<ul>
			<li><a href="controllers/Bus/add.php">Add</a></li>
			<li><a href="controllers/Bus/list.php">List</a></li>
		</ul>
		<h2>Student</h2>
		<ul>
			<li><a href="controllers/Student/add.php">Add</a></li>
			<li><a href="reports/editStudents.php">Edit</a></li>
			<li><a href="controllers/Student/list.php">List</a></li>
			<li><a href="controllers/Student/delete.php">Delete</a></li>
		</ul>
		<h2>Teacher</h2>
		<ul>
			<li><a href="controllers/Teacher/add.php">Add</a></li>
			<li><a href="controllers/Teacher/list.php">List</a></li>
		</ul>	
	</div>
</body>
</html>
<?php include("templates/footer.php"); ?>