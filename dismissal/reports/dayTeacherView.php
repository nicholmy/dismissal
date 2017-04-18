<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Teacher View</title>
	<script type="text/javascript" src="../js/dayTeacherView.js"></script>
</head>
<body>
	<form action="dayTeacherView.php">
		<!--Day: <select id="dayID" name="dayID">
			<?php include("../controllers/Day/options.php"); ?>
		</select> <br /> -->
		Teacher: <select id="teacherID" name="teacherID">
			<?php include("../controllers/Teacher/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
	<!-- <div id="overrideTable"></div> -->
</body>
</html>
<?php include("../templates/footer.php"); ?>