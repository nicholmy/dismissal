<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Teacher View</title>
	<script type="text/javascript" src="../js/teacherView.js"></script>
</head>
<body>
	<form action="teacherView.php">
		Teacher: <select id="teacherID" name="teacherID">
			<?php include("../controllers/Teacher/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>