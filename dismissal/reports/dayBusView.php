<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Line View</title>
	<script type="text/javascript" src="../js/dayBusView.js"></script>
</head>
<body>
	<form action="dayBusView.php">
		Day: <select id="dayID" name="dayID">
			<?php include("../controllers/Day/options.php"); ?>
		</select> <br />
		Bus: <select id="busID" name="busID">
			<?php include("../controllers/Bus/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
	<div id="overrideTable"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>