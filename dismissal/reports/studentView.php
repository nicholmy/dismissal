<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Line View</title>
	<script type="text/javascript" src="../js/studentView.js"></script>
</head>
<body>
	<form action="studentView.php">
		Student: <select id="studentID" name="studentID">
			<?php include("../controllers/Student/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
	<div id="overrideTable"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>