<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Teacher View</title>
	<script type="text/javascript" src="../js/lineView.js"></script>
</head>
<body>
	<form action="lineView.php">
		Line: <select id="lineName" name="lineName">
			<?php include("../controllers/Line/options.php"); ?>
		</select>
	</form>
	<div id="table"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>