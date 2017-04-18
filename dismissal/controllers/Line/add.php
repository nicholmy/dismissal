<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Add Line</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("localhost", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["name"]) {
				$query = "INSERT INTO Line(name) VALUES('$_POST[name]')";
				
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error ());
				} else {
					echo("Database updated successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Line</h1>
		<form name="input" action="add.php" method="post">
			Name: <input type="text" name="name"> <br />
			<input type="submit" value="Submit">
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>