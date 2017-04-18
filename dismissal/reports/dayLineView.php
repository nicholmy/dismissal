<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Line View</title>
	<script type="text/javascript" src="../js/dayLineView.js"></script>
</head>
<body>
	<form action="dayLineView.php">
		Day: <select id="dayID" name="dayID">
			<?php include("../controllers/Day/options.php"); ?>
		</select> <br />
		Line: <select id="lineID" name="lineID">
			<?php include("../controllers/Line/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>